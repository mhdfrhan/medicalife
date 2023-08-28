<?php

namespace App\Livewire\Products;

use App\Models\Cart;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class HomeDetail extends Component
{
	public $getSlug,  $stokProduct;

	public $quantity = 1;


	public function mount()
	{
		$detail = Products::where('slug', $this->getSlug)->first();

		$this->stokProduct = $detail->stok;
	}

	public function render()
	{
		$detail = Products::where('slug', $this->getSlug)->first();

		if (!$detail) {
			return $this->redirect(route('home'), navigate:true);
		}

		$reviews = Reviews::where('product_id', $detail->id)->get();

		$totalRatings = 0;
		foreach ($reviews as $review) {
			$totalRatings += $review->rating;
		}

		$averageRating = $reviews->count() > 0 ? $totalRatings / $reviews->count() : 0;

		return view('livewire.products.home-detail', [
			'detail' => $detail,
			'averageRating' => $averageRating,
			'reviews' => $reviews
		]);
	}


	public function buyNow($id)
	{
		if (!Auth::check()) {
			return $this->redirect(route('login'), navigate: true);
		}

		if ($this->quantity < 1) {
			session()->flash('error', 'Terjadi kesalahan!');
			return;
		}

		$product = Products::find($id);

		if (!$product) {
			return;
		}

		if ($product->stok <= 0) {
			session()->flash('error', 'Produk ini sedang habis persediaan.');
			return;
		}

		if ($this->quantity > $product->stok) {
			session()->flash('error', 'Jumlah melebihi stok yang tersedia.');
			return;
		}

		$product->quantity = $this->quantity;
		Session::put('confirm_product', $product);
		return $this->redirect(route('confirmation'), navigate: true);
	}

	public function addToCart($id)
	{
		if (!Auth::check()) {
			return $this->redirect(route('login'), navigate: true);
		}

		if ($this->quantity < 1) {
			session()->flash('error', 'Terjadi kesalahan!');
			return;
		}

		$product = Products::find($id);

		if (!$product) {
			return;
		}

		if ($product->stok <= 0) {
			session()->flash('error', 'Produk ini sedang habis persediaan.');
			return;
		}

		if ($this->quantity > $product->stok) {
			session()->flash('error', 'Jumlah melebihi stok yang tersedia.');
			return;
		}

		$cart = Cart::where('user_id', Auth::user()->id)
			->where('products_id', $product->id)
			->first();

		if ($cart) {
			$newQuantity = $cart->quantity + $this->quantity;

			if ($newQuantity > $product->stok) {
				session()->flash('error', 'Jumlah melebihi stok yang tersedia.');
				return;
			}

			$newPrice = $product->harga_diskon * $newQuantity;

			$cart->update([
				'quantity' => $newQuantity,
				'price' => $newPrice,
			]);

			$this->quantity = 1;
		} else {
			Cart::create([
				'user_id' => Auth::user()->id,
				'products_id' => $product->id,
				'quantity' => $this->quantity,
				'price' => $product->harga_diskon * $this->quantity,
			]);

			$this->quantity = 1;
		}


		session()->flash('message', 'Berhasil menambahkan ke cart!');
		$this->dispatch('cart-added');
	}

	public function increment()
	{
		if ($this->quantity < $this->stokProduct) {
			$this->quantity++;
		}
	}

	public function decrement()
	{
		if ($this->quantity > 1) {
			$this->quantity--;
		}
	}
}
