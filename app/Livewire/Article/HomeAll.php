<?php

namespace App\Livewire\Article;

use App\Models\Articles;
use Livewire\Component;
use Livewire\WithPagination;

class HomeAll extends Component
{
	use WithPagination;
	
	public $sort = 'terbaru';

	public function placeholder()
	{
		return view('placeholders.all-product');
	}

	public function render()
	{
		$query = Articles::query();

		if ($this->sort === 'terlama') {
			$query->oldest();
		} else {
			$query->latest();
		}

		$articles = $query->where('status', 1)->paginate(12);

		return view('livewire.article.home-all', [
			'articles' => $articles
		]);
	}
}
