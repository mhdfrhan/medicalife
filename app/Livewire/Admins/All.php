<?php

namespace App\Livewire\Admins;

use App\Models\Reviews;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
	use WithPagination;

	#[Url()]
	public $search = '';

	public function render()
	{
		$admins = User::where('role', 1)
			->where(function ($query) {
				$query->where('name', 'like', '%' . trim($this->search) . '%')
					->orWhere('email', 'like', '%' . trim($this->search) . '%');
			})
			->latest()->paginate(20);


		return view('livewire.admins.all', [
			'admins' => $admins
		]);
	}

	public function deleteUser($id)
	{
		$admin = User::find($id);

		if (!$admin) {
			return redirect(route('home'));
		}

		$review = Reviews::where('user_id', $admin->id)->get();
		$sales = Sales::where('user_id', $admin->id)->get();

		if ($admin->role === 1) {
			$otherAdminsCount = User::where('role', 1)->count();

			if ($otherAdminsCount === 1) {
				session()->flash('error', 'Tidak dapat menghapus admin karena hanya tersisa 1 admin');
				return $this->redirect(route('all.admin'), navigate: true);
			}
		}

		foreach ($review as $r) {
			$r->delete();
		}

		foreach ($sales as $s) {
			$s->delete();
		}

		if ($admin->image) {
			Storage::disk('public')->delete('img/profile/' . $admin->image);
		}

		$admin->delete();
		session()->flash('message', 'User berhasil dihapus!');
		return $this->redirect(route('all.admin'), navigate: true);
	}
}
