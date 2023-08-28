<?php

namespace App\Livewire\Dashboard;

use App\Models\Sales;
use Carbon\Carbon;
use Livewire\Component;

class ProductSalesMonthly extends Component
{
	public $chartData = [];

	public function mount()
	{
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
	}

	public function render()
	{
		return view('livewire.dashboard.product-sales-monthly');
	}
}
