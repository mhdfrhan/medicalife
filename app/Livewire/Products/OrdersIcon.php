<?php

namespace App\Livewire\Products;

use App\Models\Sales;
use Livewire\Attributes\On;
use Livewire\Component;

class OrdersIcon extends Component
{
	#[On('statusUpdated')]
	
	public function render()
	{
		$waiting = Sales::where('status', 'menunggu_konfirmasi')->get();

		return view('livewire.products.orders-icon', [
			'waiting' => $waiting
		]);
	}
}
