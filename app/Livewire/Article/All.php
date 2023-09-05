<?php

namespace App\Livewire\Article;

use App\Models\Articles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Url;
use Livewire\Component;

class All extends Component
{

	#[Url()]
	public $search = '';

	public function render()
	{
		$articles = Articles::latest()->where('title', 'like', '%' . $this->search . '%')->get();
		$drafts = Articles::where('status', 0)->get()->count();
		$publish = Articles::where('status', 1)->get()->count();

		return view('livewire.article.all', [
			'articles' => $articles,
			'allTotal' => $articles->count(),
			'drafts' => $drafts,
			'publish' => $publish
		]);
	}

	public function deleteArticle($id)
	{
		$article = Articles::find($id);

		if (!$article) {
			return redirect(route('home'));
		}

		$oldImage = $article->image;
		$oldPath = public_path('img/articles/' . $oldImage);
		File::delete($oldPath);

		$article->delete();

		Session::flash('message', 'Artikel berhasil dihapus');
		return $this->redirect(route('dashboard.article'), navigate: true);
	}

	public function changeStatus($id)
	{
		$article = Articles::find($id);

		if (!$article) {
			return redirect(route('home'));
		}

		$article->update([
			'status' => $article->status == 1 ? 0 : 1
		]);

		session()->flash('message', 'Status berhasil diubah');
	}
}
