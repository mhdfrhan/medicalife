<?php

namespace App\Livewire\Contact;

use App\Models\Message;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Dashboard extends Component
{
	public $filterDelete = [];
	public $selectAll = false;
	public $sortOption = 'newest';

	public function mount()
	{
		$this->sortOption = Session::get('sortOption', 'newest'); // Default sort option
	}

	public function updatedSortOption()
	{
		Session::put('sortOption', $this->sortOption);
	}

	public function read($id)
	{
		$message = Message::find($id);

		if (!$message) {
			return false;
		}

		$message->update([
			'status' => 1
		]);
	}

	public function unread($id)
	{
		$message = Message::find($id);

		if (!$message) {
			return false;
		}

		$message->update([
			'status' => 0
		]);
	}

	public function render()
	{
		$query = Message::query();

		switch ($this->sortOption) {
			case 'newest':
				$query->latest();
				break;
			case 'oldest':
				$query->oldest();
				break;
			case 'unread':
				$query->where('status', 0);
				break;
			case 'read':
				$query->where('status', 1);
				break;
		}

		$messages = $query->get();

		$read = Message::where('status', 1)->get();
		$unread = Message::where('status', 0)->get();
		return view('livewire.contact.dashboard', [
			'messages' => $messages,
			'read' => $read,
			'unread' => $unread,
		]);
	}

	public function hapus($id)
	{
		$message = Message::find($id);

		if (!$message) {
			return false;
		}

		$message->delete();
		session()->flash('message', 'Pesan berhasil dihapus.');
		$this->redirect(route('message'), navigate: true);
	}

	public function hapusSemua()
	{
		$semuaId = $this->filterDelete;

		foreach ($semuaId as $id) {
			$message = Message::find($id);

			if (!$message) {
				return false;
			}

			$message->delete();
		}
		
		session()->flash('message', 'Pesan berhasil dihapus.');
		$this->redirect(route('message'), navigate: true);
	}

	public function filterDeleteAll()
	{
		if ($this->selectAll) {
			$this->filterDelete = Message::pluck('id')->toArray();
		} else {
			$this->filterDelete = [];
		}
	}
}
