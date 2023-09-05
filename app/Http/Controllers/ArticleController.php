<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function index()
	{
		$articles = Articles::where('status', 1)->latest()->get();

		return view('articles', [
			'title' => 'Semua Artikel',
			'articles' => $articles
		]);
	}

	public function show($slug)
	{
		$article = Articles::where('slug', $slug)->first();

		return view('articleShow', [
			'title' => $article->title,
			'article' => $article
		]);
	}
}
