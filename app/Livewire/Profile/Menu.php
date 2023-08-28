<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Menu extends Component
{
	#[On('profileUpdated')]

	public function render()
	{
		return view('livewire.profile.menu');
	}

	public function hapusGambar()
	{
		Storage::disk('public')->delete('img/profile/' . Auth::user()->image);

		DB::table('users')->where('id', Auth::user()->id)->update([
			'image' => ''
		]);

		Auth::user()->refresh();
		session()->flash('message', 'Gambar dihapus!');
	}
}
