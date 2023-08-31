<?php

namespace App\Livewire\Contact;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Send extends Component
{
	public $name, $email, $subject, $message;

	protected $rules = [
		'name' => 'required|min:3',
		'email' => 'required|email',
		'subject' => 'required|min:5',
		'message' => 'required'
	];

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function send()
	{

		if (!Auth::check()) {
			return $this->redirect(route('login'), navigate:true);
		}

		$this->validate();

		$message = DB::table('messages');
		$message->insert([
			'name' => trim($this->name),
			'email' => trim($this->email),
			'subject' => trim($this->subject),
			'message' => trim($this->message),
			'created_at' => now(),
			'status' => 0
		]);

		session()->flash('message', 'Pesan berhasil terkirim!');

		$this->resetInput();
	}

	public function render()
	{
		return view('livewire.contact.send');
	}

	public function resetInput()
	{
		$this->name = '';
		$this->email = '';
		$this->subject = '';
		$this->message = '';
	}
}
