<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
	public $name, $email, $password, $password_confirmation;

	protected $rules = [
		'name' => 'required',
		'email' => 'required|email|unique:users,email',
		'password' => 'required|min:8|confirmed'
	];

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function register()
	{
		$this->validate();

		$user = User::create([
			'name' => $this->name,
			'email' => $this->email,
			'password' => Hash::make($this->password),
		]);

		event(new Registered($user));

		Auth::login($user);

		return $this->redirect('/', navigate: true);
	}

	public function render()
	{
		return view('livewire.auth.register');
	}
}
