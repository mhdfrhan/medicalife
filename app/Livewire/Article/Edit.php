<?php

namespace App\Livewire\Article;

use App\Models\Articles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{

	use WithFileUploads;

	public $title, $slug, $image, $content, $getSlug, $deskripsi, $oldImage, $articleId;

	protected function rules()
	{
		$rules = [
			'title' => 'required',
			'slug' => 'required|unique:articles,slug,' . $this->articleId,
			'image' => 'nullable|image|max:2048',
			'content' => 'required|min:10'
		];

		return $rules;
	}

	public function mount()
	{
		$article = Articles::where('slug', $this->getSlug)->first();

		$this->articleId = $article->id;
		$this->title = $article->title;
		$this->slug = $article->slug;
		$this->content = $article->content;
		$this->deskripsi = $article->content;
		$this->oldImage = $article->image;
	}

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function save()
	{
		$this->validate();

		$article = Articles::find($this->articleId);

		if ($this->title !== $article->title) {
			$slug = $this->makeUniqueSlug($this->slug);
		} else {
			$slug = $this->slug;
		}

		if ($this->image) {
			$oldImage = $article->image;
			$oldPath = public_path('img/articles/' . $oldImage);
			File::delete($oldPath);


			$imageName = 'IMG-' . Str::random(50) . '.' . $this->image->getClientOriginalExtension();
			$imagePath = $this->image->storeAs('img/articles/', $imageName, 'public');

			$article->update([
				'image' => $imageName
			]);
		}

		$article->update([
			'title' => trim($this->title),
			'slug' => trim($slug),
			'content' => trim($this->content),
			'status' => 1
		]);

		Session::flash('message', 'Berhasil mengupdate artikel');
		return $this->redirect(route('dashboard.article'), navigate: true);
	}

	public function draft()
	{
		$this->validate();

		$article = Articles::find($this->articleId);

		if ($this->title !== $article->title) {
			$slug = $this->makeUniqueSlug($this->slug);
		} else {
			$slug = $this->slug;
		}

		if ($this->image) {
			$oldImage = $article->image;
			$oldPath = public_path('img/articles/' . $oldImage);
			File::delete($oldPath);


			$imageName = 'IMG-' . Str::random(50) . '.' . $this->image->getClientOriginalExtension();
			$imagePath = $this->image->storeAs('img/articles/', $imageName, 'public');

			$article->update([
				'image' => $imageName
			]);
		}

		$article->update([
			'title' => trim($this->title),
			'slug' => trim($slug),
			'content' => trim($this->content),
			'status' => 0
		]);

		Session::flash('message', 'Berhasil mengupdate artikel ke draft');
		return $this->redirect(route('dashboard.article'), navigate: true);
	}

	public function render()
	{
		return view('livewire.article.edit');
	}

	public function updatedTitle()
	{
		$baseSlug = Str::slug($this->title, '-');

		if ($baseSlug !== $this->slug) {
			$proposedSlug = $baseSlug;

			$count = 2;
			while (Articles::where('slug', $proposedSlug)->where('id', '!=', $this->articleId)->exists()) {
				$proposedSlug = $baseSlug . '-' . $count;
				$count++;
			}

			$this->slug = $proposedSlug;

			$this->validateOnly('slug', [
				'slug' => 'unique:articles,slug,' . $this->articleId
			]);
		}
	}

	public function updatedSlug()
	{
		$this->validateOnly('slug', [
			'slug' => 'unique:articles,slug,' . $this->articleId,
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
