<?php

namespace App\Livewire\Profile;

use App\Models\Products;
use App\Models\Reviews;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
	public $invoice, $sales;
	public $rating = 0;
	public $review = '';

	protected $rules = [
		'rating' => 'required|integer|between:1,5',
		'review' => 'nullable|min:5'
	];

	protected $messages = [
		'rating.required' => 'Rating harus diisi.',
		'rating.between' => 'Rating harus diisi.',
		'review.required' => 'Ulasan harus diisi.',
		'review.min' => 'Ulasan terlalu singkat',
	];

	public function mount()
	{
		$sales = Sales::where('invoice', $this->invoice)->where('user_id', Auth::user()->id)->where('status', 'selesai')->first();

		if (!$sales) {
			return $this->redirect(route('home'), navigate: true);
		}

		$this->sales = $sales;
	}

	public $placeholderTexts = [
		0 => 'Tulis ulasan Anda disini',
		1 => 'Beritahu kami pendapat Anda',
		2 => 'Apa yang Anda tidak sukai dari produk ini?',
		3 => 'Apa yang Anda suka atau tidak suka?',
		4 => 'Beritahu kami mengapa Anda menyukai produk ini?',
		5 => 'Apa yang akan Anda rekomendasikan?',
	];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function submitReview()
	{
		$this->validate();

		Reviews::create([
			'user_id' => Auth::user()->id,
			'product_id' => $this->sales->product->id,
			'invoice' => $this->sales->invoice,
			'rating' => $this->rating,
			'comment' => $this->review,
			'created_at' => now()
		]);

		$this->rating = 0;
		$this->review = '';

		session()->flash('message', 'Ulasan berhasil dikirimkan.');
	}


	public function render()
	{
		$userReviews = Reviews::where('user_id', Auth::user()->id)->where('invoice', $this->invoice)->first();
		return view('livewire.profile.review', [
			'sales' => $this->sales,
			'userReviews' => $userReviews,
		]);
	}
}
