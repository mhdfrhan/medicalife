<?php

namespace App\Livewire\Products;

use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Orders extends Component
{
	public function render()
	{
		$semua = Sales::latest()->get();
		$menunggu = Sales::where('status', 'menunggu_konfirmasi')->latest()->get();
		$dikemas = Sales::where('status', 'dikemas')->latest()->get();
		$dikirim = Sales::where('status', 'dikirim')->latest()->get();
		$selesai = Sales::where('status', 'selesai')->latest()->get();

		$orders = Sales::latest()->get();

		return view('livewire.products.orders', [
			'orderBy' => $orders->groupBy('invoice'),
			'semua' => $semua,
			'menunggu' => $menunggu,
			'dikemas' => $dikemas,
			'dikirim' => $dikirim,
			'selesai' => $selesai
		]);
	}
}
