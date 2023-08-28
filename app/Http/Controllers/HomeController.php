<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{

		return view('home', [
			'title' => 'Home'
		]);
	}

	public function detailProduct($slug)
	{
		$detail = Products::where('slug', $slug)->first();

		if (!$detail) {
			return redirect(route('home'));
		}
		
		$reviews = Reviews::where('product_id', $detail->id)->get();

		return view('detail-product', [
			'title' => 'Detail Product',
			'slug' => $slug,
			'detail' => $detail,
			'reviews' => $reviews
		]);
	}

	public function profile()
	{
	}

	public function allProducts()
	{
		return view('all-products', [
			'title' => 'Semua Produk'
		]);
	}
}
