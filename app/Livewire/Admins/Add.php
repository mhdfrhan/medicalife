<?php

namespace App\Livewire\Admins;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Add extends Component
{
	public $name, $email, $password;

	protected $rules = [
		'name' => 'required',
		'email' => 'required|email|unique:users,email',
		'password' => 'required|min:8'
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function save()
	{
		$this->validate();

		$password = Hash::make($this->password);

		$user = DB::table('users')->insert([
			'name' => trim($this->name),
			'email' => trim($this->email),
			'password' => $password,
			'role' => 1,
			'created_at' => now()
		]);

		if ($user) {
			session()->flash('message', 'Admin berhasil ditambahkan!');
			return $this->redirect(route('all.admin'), navigate: true);
		}
	}

	public function render()
	{
		return view('livewire.admins.add');
	}
}
