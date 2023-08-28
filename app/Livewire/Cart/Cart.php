<?php

namespace App\Livewire\Cart;

use App\Models\Cart as ModelsCart;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{

	public $totalHarga;

	public function render()
	{
		$carts = ModelsCart::where('user_id', Auth::user()->id)->get();
		$totalHarga = $carts->sum('price');

		$this->totalHarga = $totalHarga;

		return view('livewire.cart.cart', [
			'carts' => $carts
		]);
	}

	public function plusQuantity($id)
	{
		$cart = ModelsCart::find($id);

		if (!$cart) {
			session()->flash('error', 'Terjadi kesalahan!');
			return;
		}

		$product = $cart->product;

		$cart->update([
			'quantity' => $cart->quantity + 1,
			'price' => $cart->price + $product->harga_diskon
		]);
	}

	public function minusQuantity($id)
	{
		$cart = ModelsCart::find($id);

		if (!$cart) {
			session()->flash('error', 'Terjadi kesalahan!');
			return;
		}

		$product = $cart->product;

		if ($cart->quantity <= 1) {
			$cart->delete();
			session()->flash('message', 'Item dihapus dari cart!');
		} else {
			$cart->update([
				'quantity' => $cart->quantity - 1,
				'price' => $cart->price - $product->harga_diskon
			]);
		}
	}

	public function confirm()
	{	

		Session::forget('confirm_product');
		return $this->redirect(route('confirmation'), navigate:true);
	}

}
