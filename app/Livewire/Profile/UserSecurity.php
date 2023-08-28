<?php

namespace App\Livewire\Profile;

use Livewire\Component;

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSecurity extends Component
{
	public $oldPassword, $password, $password_confirmation;

	protected $rules = [
		'oldPassword' => 'required',
		'password' => 'required|min:8|confirmed',
	];

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function updatedOldPassword()
	{
		if (!Hash::check($this->oldPassword, Auth::user()->password)) {
			$this->addError('oldPassword', 'Password Anda salah.');
			return;
		}
	}

	public function render()
	{
		return view('livewire.profile.user-security');
	}

	public function save()
	{
		$this->validate();

		if (!Hash::check($this->oldPassword, Auth::user()->password)) {
			$this->addError('oldPassword', 'Password Anda salah.');
			return;
		}

		Auth::user()->update([
			'password' => Hash::make($this->password),
		]);

		$this->oldPassword = $this->password = $this->password_confirmation = null;

		session()->flash('message', 'Password berhasil di update.');
	}
}
