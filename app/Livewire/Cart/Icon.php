<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Icon extends Component
{
	public $cartCount = 0;

	#[On('cart-added')]

	public function mount()
	{
		if (Auth::check()) {
			$cartCount = Cart::where('user_id', Auth::user()->id)->get()->count();

			$this->cartCount = $cartCount; // Perbarui cartCount sesuai dengan jumlah item yang tersisa di keranjang
		}
	}


	public function render()
	{
		return view('livewire.cart.icon');
	}
}
