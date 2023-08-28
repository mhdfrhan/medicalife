<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
		{
			$carts = Cart::where('user_id', Auth::user()->id)->get();

			return view('cart', [
				'title' => 'Shopping Cart',
				'carts' => $carts
			]);
		}

		public function confirmation()
		{
			$getProducts = session('confirm_product', []);

			return view('confirmation', [
				'title' => 'Confirm Checkout',
				'getProducts' => $getProducts ? $getProducts : NULL
			]);
		}
}
