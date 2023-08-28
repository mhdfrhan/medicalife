<?php

namespace App\Livewire\Users;

use App\Models\Reviews;
use App\Models\Sales;
use Livewire\Attributes\Url;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
	use WithPagination;

	#[Url]
	public $search = '';

	public function render()
	{

		$user = User::where('role', 0)
			->where(function ($query) {
				$query->where('name', 'like', '%' . trim($this->search) . '%')
					->orWhere('email', 'like', '%' . trim($this->search) . '%');
			})
			->latest()->paginate(20);

		return view('livewire.users.all', [
			'users' =>  $user
		]);
	}

	public function deleteUser($id)
	{
		$user = User::find($id);

		if (!$user) {
			return redirect(route('home'));
		}

		$review = Reviews::where('user_id', $user->id)->get();
		$sales = Sales::where('user_id', $user->id)->get();

		foreach ($review as $r) {
			$r->delete();
		}

		foreach ($sales as $s) {
			$s->delete();
		}

		if ($user->image) {
			Storage::disk('public')->delete('img/profile/' . $user->image);
		}

		$user->delete();
		session()->flash('message', 'User berhasil dihapus!');
		return $this->redirect(route('all.users'), navigate: true);
	}
}
