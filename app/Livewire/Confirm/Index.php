<?php

namespace App\Livewire\Confirm;

use App\Models\Cart;
use App\Models\Products;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Index extends Component
{
	public $getProducts, $total, $message, $quantityBuyNow;

	public $cart = [];

	public function render()
	{
		if ($this->getProducts === null) {

			$this->cart = Cart::where('user_id', Auth::user()->id)->get();

			return view('livewire.confirm.index', [
				'cart' => $this->cart
			]);
		} else {

			$products = $this->getProducts;

			$this->quantityBuyNow = $products->quantity;
			$this->total = $products->harga_diskon * $products->quantity;

			return view('livewire.confirm.index', [
				'getProduct' => $products
			]);
		}
	}

	public function confirm()
	{
		$user = Auth::user();
    $invoicePrefix = 'INV';

    $currentDate = now();
    $day = $currentDate->day;
    $month = $currentDate->format('m');
    $year = $currentDate->year;

    $randomChars = strtoupper(Str::random(8));

    $invoiceNumber = $invoicePrefix . "-$day$month$year$randomChars";

		if ($this->getProducts === NULL) {
			$carts = Cart::where('user_id', $user->id)->get();

			foreach ($carts as $cart) {
				$product = $cart->product;

				DB::table('sales')->insert([
					'user_id' => $user->id,
					'invoice' => $invoiceNumber,
					'product_id' => $cart->products_id,
					'pesan' => $this->message,
					'quantity' => $cart->quantity,
					'total_price' => $cart->price,
					'status' => 'menunggu_konfirmasi',
					'created_at' => now()
				]);

				$product->stok -= $cart->quantity;
				$product->save();
			}

			Cart::where('user_id', $user->id)->delete();
		} else {
			$products = $this->getProducts;
			$tableProducts = Products::find($products->id);

			DB::table('sales')->insert([
				'user_id' => $user->id,
				'invoice' => $invoiceNumber,
				'product_id' => $products->id,
				'pesan' => $this->message,
				'quantity' => $this->quantityBuyNow,
				'total_price' => $products->harga_diskon * $this->quantityBuyNow,
				'status' => 'menunggu_konfirmasi',
				'created_at' => now()
			]);

			$tableProducts->stok -= $this->quantityBuyNow;
			$tableProducts->save();
		}

		Session::flash('message', 'Berhasil membeli barang');
		return $this->redirect(route('user.transaction'), navigate: true);
	}
}
