<?php

namespace App\Livewire\Article;

use App\Models\Articles;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Add extends Component
{
	use WithFileUploads;

	public $title, $slug, $image, $content;

	protected $rules = [
		'title' => 'required',
		'slug' => 'required|unique:articles,slug',
		'image' => 'required|image|max:2048',
		'content' => 'required|min:10'
	];

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function save()
	{
		$this->validate();

		$slug = $this->makeUniqueSlug($this->slug);

		$imageName = 'IMG-' . Str::random(50) . '.' . $this->image->getClientOriginalExtension();
		$imagePath = $this->image->storeAs('img/articles/', $imageName, 'public');

		Articles::create([
			'title' => trim($this->title),
			'slug' => trim($slug),
			'content' => trim($this->content),
			'status' => 1,
			'image' => $imageName,
			'created_at' => now()
		]);

		Session::flash('message', 'Berhasil menambahkan artikel');
		return $this->redirect(route('dashboard.article'), navigate: true);
	}

	public function draft()
	{
		$this->validate();

		$slug = $this->makeUniqueSlug($this->slug);

		$imageName = 'IMG-' . Str::random(50) . '.' . $this->image->getClientOriginalExtension();
		$imagePath = $this->image->storeAs('img/articles/', $imageName, 'public');

		Articles::create([
			'title' => trim($this->title),
			'slug' => trim($slug),
			'content' => trim($this->content),
			'status' => 0,
			'image' => $imageName
		]);

		Session::flash('message', 'Berhasil menambahkan artikel ke draft');
		return $this->redirect(route('dashboard.article'), navigate: true);
	}

	public function render()
	{
		return view('livewire.article.add');
	}

	public function updatedTitle()
	{
		$baseSlug = Str::slug($this->title, '-');
		$proposedSlug = $baseSlug;

		$count = 2;
		while (Articles::where('slug', $proposedSlug)->exists()) {
			$proposedSlug = $baseSlug . '-' . $count;
			$count++;
		}

		$this->slug = $proposedSlug;

		$this->validateOnly('slug', [
			'slug' => 'unique:articles'
		]);
	}

	public function updatedSlug()
	{
		$this->validateOnly('slug', [
			'slug' => 'unique:articles'
		]);
	}

	protected function makeUniqueSlug($proposedSlug)
	{
		$count = 1;
		$slug = $proposedSlug;

		while (Articles::where('slug', $slug)->exists()) {
			$slug = $proposedSlug . '-' . $count;
			$count++;
		}

		return $slug;
	}
}
