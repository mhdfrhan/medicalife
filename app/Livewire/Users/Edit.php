<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
	use WithFileUploads;

	#[Locked]
	public $getId;

	public $name, $email, $password, $status, $image;

	protected function rules()
	{
		$rules = [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,' . $this->getId,
			'password' => 'nullable|min:8',
			'image' => 'nullable|image|max:2048'
		];

		return $rules;
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function mount()
	{
		$user = User::find($this->getId);

		$this->name = $user->name;
		$this->email = $user->email;
		$this->status = $user->role === 0 ? 'customer' : 'admin';
	}

	public function update()
	{
		$user = User::find($this->getId);

		if (!$user) {
			return redirect(route('home'));
		}

		$this->validate();

		$password = Hash::make($this->password);

		if ($this->image) {
			if ($user->image) {
				Storage::disk('public')->delete('img/profile/' . $user->image);
			}

			$imageName = Str::slug($this->name) . '-' . Str::random(10) . '.' . $this->image->getClientOriginalExtension();
			$imagePath = $this->image->storeAs('img/profile/', $imageName, 'public');

			DB::table('users')->where('id', $this->getId)->update([
				'image' => $imageName
			]);
		}

		$user = DB::table('users')->where('id', $this->getId)->update([
			'name' => trim($this->name),
			'email' => trim($this->email),
			'password' => $password,
			'role' => $this->status !== 'admin' ? 0 : 1,
		]);

		if ($user) {
			session()->flash('message', 'User berhasil ditambahkan!');
			return $this->redirect(route('all.users'), navigate: true);
		}
	}

	public function hapusGambar()
	{
		$user = User::find($this->getId);

		if (!$user) {
			return redirect(route('home'));
		}

		if ($user->image) {
			Storage::disk('public')->delete('img/profile/' . $user->image);
		}

		DB::table('users')->where('id', $this->getId)->update([
			'image' => ''
		]);

		session()->flash('message', 'Gambar dihapus!');
	}

	public function render()
	{
		$user = User::find($this->getId);
		return view('livewire.users.edit', [
			'user' => $user
		]);
	}
}
