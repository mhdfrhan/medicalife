<?php

namespace App\Livewire\Profile;

use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserReview extends Component
{
	public function render()
	{
		$review = Reviews::where('user_id', Auth::user()->id)->get();

		return view('livewire.profile.user-review', [
			'review' => $review
		]);
	}
}
