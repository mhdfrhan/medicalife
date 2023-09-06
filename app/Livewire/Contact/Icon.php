<?php

namespace App\Livewire\Contact;

use App\Models\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class Icon extends Component
{
	#[On('messageUpdated')]

	public function render()
	{
		$unread = Message::where('status', 0)->get();

		return view('livewire.contact.icon', [
			'unread' => $unread
		]);
	}
}
