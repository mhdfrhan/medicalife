<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Card extends Component
{

	public function render()
	{
		$products = Products::where('publish', 1)->latest()->take(3)->get();
		return view('livewire.cart.card', [
			'products' => $products
		]);
	}

	public function addToCart($id)
	{
		if (!Auth::check()) {
			return $this->redirect(route('login'), navigate:true);	
		}

		$product = Products::find($id);

		if (!$product) {
			return;
		}

		if ($product->stok <= 0) {
			session()->flash('error', 'Produk ini sedang habis persediaan.');
			return;
		}

		$cart = Cart::where('user_id', Auth::user()->id)
			->where('products_id', $product->id)
			->first();

		if ($cart) {
			$newQuantity = $cart->quantity + 1;
			$newPrice = $cart->price + $product->harga_diskon;

			if ($newQuantity > $product->stok) {
				session()->flash('error', 'Jumlah melebihi stok yang tersedia.');
				return;
			}

			$cart->update([
				'quantity' => $newQuantity,
				'price' => $newPrice,
			]);
		} else {
			Cart::create([
				'user_id' => Auth::user()->id,
				'products_id' => $product->id,
				'quantity' => 1,
				'price' => $product->harga_diskon,
			]);
		}

		session()->flash('message', 'Berhasil menambahkan ke cart!');
		$this->dispatch('cart-added');
	}
}
