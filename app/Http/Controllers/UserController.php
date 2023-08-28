<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function dashboard()
	{
		return view('user-dashboard', [
			'title' => 'Dashboard'
		]);
	}


	public function transaction()
	{
		return view('transaction', [
			'title' => 'Transaksi'
		]);
	}

	public function review($invoice)
	{
		return view('review', [
			'title' => 'Ulasan Anda',
			'invoice' => $invoice
		]);
	}

	public function userReviews()
	{
		return view('user-review' , [
			'title' => 'Ulasan Anda'
		]);
	}

	public function security()
	{
		return view('security', [
			'title' => 'Security'
		]);
	}
}
