<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UserDashboard extends Component
{
	use WithFileUploads;

	public $name, $email, $phone, $address, $image;

	public function mount()
	{
		$this->name = Auth::user()->name;
		$this->email = Auth::user()->email;
		$this->phone = Auth::user()->no_telepon;
		$this->address = Auth::user()->alamat;
	}

	protected $rules = [
		'image' => 'nullable|image|max:2048',
		'name' => 'required|min:3',
		'email' => 'required|email',
		'phone' => 'required',
		'address' => 'required|min:10'
	];

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function render()
	{
		return view('livewire.profile.user-dashboard');
	}

	public function updateData()
	{
		$this->validate();

		if ($this->image) {
			if (Auth::user()->image) {
				Storage::disk('public')->delete('img/profile/' . Auth::user()->image);
			}

			$imageName = Str::slug($this->name) . '-' . Str::random(10) . '.' . $this->image->getClientOriginalExtension();
			$imagePath = $this->image->storeAs('img/profile/', $imageName, 'public');

			DB::table('users')->where('id', Auth::user()->id)->update([
				'image' => $imageName
			]);
		}

		DB::table('users')->where('id', Auth::user()->id)->update([
			'name' => trim($this->name),
			'email' => trim($this->email),
			'no_telepon' => trim($this->phone),
			'alamat' => trim($this->address)
		]);

		Auth::user()->refresh();
		$this->dispatch('profileUpdated');

		session()->flash('message', 'Profile berhasil diupdate!');
	}

	public function hapusGambar()
	{
		Storage::disk('public')->delete('img/profile/' . Auth::user()->image);

		DB::table('users')->where('id', Auth::user()->id)->update([
			'image' => ''
		]);

		Auth::user()->refresh();
		$this->dispatch('profileUpdated');
		session()->flash('message', 'Gambar dihapus!');
	}
}
