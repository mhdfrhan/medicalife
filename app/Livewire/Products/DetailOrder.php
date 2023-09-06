<?php

namespace App\Livewire\Products;

use App\Models\Sales;
use App\Models\User;
use Livewire\Component;

class DetailOrder extends Component
{
	public $invoice, $userId, $totalPrice, $shippingDate, $totalItems, $status;

	public function mount()
	{
		$sales = Sales::where('invoice', strtoupper($this->invoice))->first();

		if (!$sales) {
			return $this->redirect(route('dashboard'), navigate: true);
		}

		if ($sales) {
			$this->userId = $sales->user_id;
			$this->shippingDate = $sales->created_at;
			$this->totalPrice = Sales::where('user_id', $this->userId)
				->where('invoice', strtoupper($this->invoice))
				->sum('total_price');
			$this->status = $sales->status;
		}
	}

	public function render()
	{
		$sales = Sales::where('invoice', strtoupper($this->invoice))->get();

		if (!$sales) {
			return;
		}

		$this->totalItems = $sales->count();

		$user = User::where('id', $this->userId)->first();

		return view('livewire.products.detail-order', [
			'sales' => $sales,
			'user' => $user,
		]);
	}

	public function updateStatus()
	{
		Sales::where('user_id', $this->userId)
			->where('invoice', strtoupper($this->invoice))
			->update(['status' => $this->status]);

		session()->flash('message', 'Status berhasil diperbarui.');

		$this->dispatch('statusUpdated');
	}
}
