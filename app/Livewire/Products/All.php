<?php

namespace App\Livewire\Products;

use App\Models\Products;
use App\Models\Reviews;
use App\Models\Sales;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
	use WithPagination;

	#[Url()]
	public $search = '';

	public function render()
	{
		$products = Products::with('images')->latest()->where('judul', 'like', '%' . $this->search . '%')->paginate(20);
		$publish = Products::where('publish', 1)->get()->count();
		$draft = Products::where('publish', 0)->get()->count();

		return view('livewire.products.all', [
			'allTotal' => $products->count(),
			'published' => $publish,
			'drafts' => $draft,
			'products' => $products
		]);
	}


	public function deleteProduct($id)
	{
		$product = Products::find($id);

		if (!$product) {
			return redirect(route('home'));
		}

		$review = Reviews::where('product_id', $product->id)->get();
		$sales = Sales::where('product_id', $product->id)->get();

		$imagesToDelete = [];

		foreach ($product->images as $image) {
			$imagesToDelete[] = $image->image;
		}

		$product->images()->delete();

		foreach ($review as $r ) {
			$r->delete();
		}

		foreach ($sales as $s ) {
			$s->delete();
		}

		foreach ($imagesToDelete as $imageName) {
			$oldPath = public_path('img/products/' . $imageName);
			if (File::exists($oldPath)) {
				File::delete($oldPath);
			}
		}

		$product->delete();

		Session::flash('message', 'Berhasil menghapus produk!');
		return $this->redirect(route('dashboard.products'), navigate: true);
	}
}
