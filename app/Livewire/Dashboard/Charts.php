<?php

namespace App\Livewire\Dashboard;

use App\Models\Sales;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Charts extends Component
	{
		public $chartDataUser;
		public $chartData = [];

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

			$salesData = Sales::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total_sales')
				->where('status', 'selesai')
				->groupBy('year', 'month')
				->orderBy('year')
				->orderBy('month')
				->get();

			$salesData->transform(function ($item) {
				$yearMonth = Carbon::createFromDate($item->year, $item->month);
				return [
					'year_month' => $yearMonth->format('Y-m'),
					'month_name' => $yearMonth->format('F'),
					'total_sales' => $item->total_sales,
				];
			});

			$this->chartData = $salesData->pluck('total_sales', 'month_name');

			$this->chartDataUser = $userData->pluck('total_users', 'month_name');
		}

		public function render()
		{
			return view('livewire.dashboard.charts');
		}
	}
