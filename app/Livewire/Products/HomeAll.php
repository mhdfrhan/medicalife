<?php

namespace App\Livewire\Products;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
		$query = Products::query();

		if ($this->sort === 'terlama') {
			$query->oldest();
		} elseif ($this->sort === 'terlaris') {
			$query->withCount(['sales as total_sold' => function ($query) {
				$query->where('status', 'selesai')->select(DB::raw('SUM(quantity)'));
			}])
				->orderByDesc('total_sold');
		} else {
			$query->latest();
		}

		$products = $query->paginate(12);

		return view('livewire.products.home-all', [
			'products' => $products
		]);
	}

	public function addToCart($id)
	{
		if (!Auth::check()) {
			return $this->redirect(route('login'), navigate: true);
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
