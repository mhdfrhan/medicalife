<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Reviews;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		$pending = Sales::where('status', 'menunggu_konfirmasi')->get();
		$delivery = Sales::where('status', 'dikirim')->get();
		$outStock = Products::where('stok', '<', 0)->get();
		$orders = Sales::latest()->take(10)->get();
		$users = User::where('role', 0)->latest()->take(10)->get();

		return view('dashboard.index', [
			'title' => 'Dashboard',
			'pending' => $pending,
			'delivery' => $delivery,
			'outStock' => $outStock,
			'orderBy' => $orders->groupBy('invoice'),
			'semua' => $orders,
			'users' => $users
		]);
	}

	public function allProducts()
	{
		return view('dashboard.products.all', [
			'title' => 'Semua Produk'
		]);
	}

	public function addProducts()
	{
		return view('dashboard.products.add', [
			'title' => 'Tambah Produk'
		]);
	}

	public function editProducts($slug)
	{
		return view('dashboard.products.edit', [
			'title' => 'Edit Produk',
			'slug' => $slug
		]);
	}

	public function order()
	{
		return view('dashboard.products.order', [
			'title' => 'Orders'
		]);
	}

	public function detailOrder($invoice)
	{
		return view('dashboard.products.detail-order', [
			'title' => 'Detail Order',
			'invoice' => $invoice
		]);
	}

	public function allUsers()
	{
		return view('dashboard.users.all', [
			'title' => 'Semua User'
		]);
	}

	public function addUser()
	{
		return view('dashboard.users.add', [
			'title' => 'Tambah User'
		]);
	}

	public function editUser($id)
	{
		$getId = decrypt($id);
		$user = User::find($getId);

		if (!$user) {
			return redirect(route('home'));
		}
		
		if (!$getId) {
			return redirect(route('home'));
		}

		return view('dashboard.users.edit', [
			'title' => 'Edit User',
			'getId' => $getId
		]);
	}

	public function detailUser($id)
	{
		$getId = decrypt($id);
		$user = User::find($getId);

		if (!$user) {
			return redirect(route('home'));
		}

		$total_price = Sales::where('user_id', $user->id)->where('status', 'selesai')->sum('total_price');
		$last_order = Sales::where('user_id', $user->id)->where('status', 'selesai')->latest()->select('created_at')->first();
		$total_orders = Sales::where('user_id', $user->id)->where('status', 'selesai')->get()->count();
		$salesByUser =  Sales::where('user_id', $user->id)->where('status', 'selesai')->get();
		$reviewByUser = Reviews::where('user_id', $user->id)->get();

		$last_order = $last_order ? $last_order->created_at->diffForHumans() : '-';

		return view('dashboard.users.detail', [
			'title' => 'Detail User',
			'user' => $user,
			'total_price' => $total_price,
			'last_order' => $last_order,
			'total_orders' => $total_orders,
			'salesByUser' => $salesByUser,
			'reviewByUser' => $reviewByUser
		]);
	}

	public function allAdmins()
	{
		return view('dashboard.admin.all', [
			'title' => 'Semua Admin'
		]);
	}

	public function addAdmin()
	{
		return view('dashboard.admin.add', [
			'title' => 'Tambah Admin'
		]);
	}

	public function message()
	{
		return view('dashboard.messages.index', [
			'title' => 'Pesan Masuk'
		]);
	}
}
