<?php

namespace App\Livewire\Profile;

use App\Models\Reviews;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
	use WithPagination;

	public $sort = 'semua';

	public function render()
	{
		$query = Sales::where('user_id', Auth::user()->id);

		if ($this->sort !== 'semua') {
			$query->where('status', $this->sort);
		}


		$sales = $query->latest()->paginate(10);

		return view('livewire.profile.transactions', [
			'sales' => $sales
		]);
	}

	public function batalkan($id)
	{
		$sales = Sales::find($id);

		if (!$sales) {
			return;
		}

		$product = $sales->product;
		$product->stok += $sales->quantity;
		$product->save();

		$sales->delete();

		session()->flash('message', 'Pesanan berhasil dibatalkan.');
		return $this->redirect(route('user.transaction'), navigate: true);
	}
}
