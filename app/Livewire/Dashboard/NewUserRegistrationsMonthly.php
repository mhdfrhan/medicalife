<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class NewUserRegistrationsMonthly extends Component
{
	public $chartData;

	public function mount()
	{
		$userData = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total_users')
			->where('role', 0)
			->groupBy('year', 'month')
			->orderBy('year')
			->orderBy('month')
			->get();

		$userData->transform(function ($item) {
			$yearMonth = Carbon::createFromDate($item->year, $item->month);
			return [
				'year_month' => $yearMonth->format('Y-m'),
				'month_name' => $yearMonth->format('F'), // Nama bulan
				'total_users' => $item->total_users,
			];
		});

		$this->chartData = $userData->pluck('total_users', 'month_name');
	}

	public function render()
	{
		return view('livewire.dashboard.new-user-registrations-monthly');
	}
}
