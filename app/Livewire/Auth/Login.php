<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
	public $email, $password, $remember;

	protected $rules = [
		'email' => 'required|email',
		'password' => 'required|min:8'
	];

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function login()
	{
		$this->validate();

		$userCount = User::where('email', $this->email)->count();

		if ($userCount === 0) {
			session()->flash('error', 'Email tidak ditemukan.');
			return null;
		}

		if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
			session()->flash('error', 'Email/password salah.');
			return null;
		}

		if (Auth::user()->role === 1) {
			return $this->redirect(route('dashboard'));
		} else {
			return $this->redirect('/', navigate: true);
		}
	}


	public function render()
	{
		return view('livewire.auth.login');
	}
}
