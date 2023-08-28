<?php

namespace App\Livewire\Products;

use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
	use WithFileUploads;

	public $judul, $detail, $deskripsi, $harga_awal, $harga_diskon, $stok, $pengiriman, $slug, $getSlug, $contentDetail, $contentDeskripsi, $productId, $newImage, $totalImages;

	public $images = [];
	public $displayedImages = 1;

	public function mount()
	{
		$p = Products::where('slug', $this->getSlug)->first();

		if (!$p || $this->getSlug === NULL) {
			return $this->redirect(route('home'));
		}

		$images = ProductImage::where('products_id', $p->id)->get();

		$this->totalImages = $images->count();

		$this->judul = $p->judul;
		$this->slug = $p->slug;
		$this->deskripsi = $p->deskripsi;
		$this->detail = $p->detail;
		$this->harga_awal = $p->harga_asli;
		$this->harga_diskon = $p->harga_diskon;
		$this->stok = $p->stok;
		$this->pengiriman = $p->pengiriman == 'Cash On Delivery' ? 1 : '';
		$this->contentDetail = $p->detail;
		$this->contentDeskripsi = $p->deskripsi;
		$this->productId = $p->id;
	}

	public function rules()
	{
		$rules = [
			'judul' => 'required|string',
			'slug' => 'required|unique:products,slug,' . $this->productId,
			'detail' => 'required|string',
			'deskripsi' => 'required|string',
			'harga_awal' => 'nullable|numeric',
			'harga_diskon' => 'required|numeric',
			'stok' => 'required|numeric',
			'pengiriman' => 'required',
		];

		$rules['images.0'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';

		for ($i = 1; $i < $this->displayedImages; $i++) {
			$rules["images.$i"] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
		}

		return $rules;
	}

	public function updatedImages()
	{

		$this->displayedImages++;
	}

	public function deleteImage($index)
	{
		unset($this->images[$index]);

		if ($this->displayedImages > 0) {
			$this->displayedImages--;
		}
	}

	public function deleteOldImage($id)
	{
		$image = ProductImage::find($id);

		$oldPath = public_path('img/products/' . $image->image);
		File::delete($oldPath);

		$image->delete();

		$this->totalImages--;
	}

	public function updatedJudul()
	{
		$baseSlug = Str::slug($this->judul, '-');

		if ($baseSlug !== $this->slug) {
			$proposedSlug = $baseSlug;

			$count = 2;
			while (Products::where('slug', $proposedSlug)->where('id', '!=', $this->productId)->exists()) {
				$proposedSlug = $baseSlug . '-' . $count;
				$count++;
			}

			$this->slug = $proposedSlug;

			$this->validateOnly('slug', [
				'slug' => 'unique:products,slug,' . $this->productId
			]);
		}
	}


	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function updatedSlug()
	{
		$this->validateOnly('slug', [
			'slug' => 'unique:products,slug,' . $this->productId,
		]);
	}

	public function update()
	{
		$this->validate();

		if ($this->harga_awal <= $this->harga_diskon) {
			return $this->addError('diskon', 'Harga awal harus lebih besar dari harga diskon.');
		}

		$product = Products::find($this->productId);

		if ($this->judul !== $product->judul) {
			$slug = $this->makeUniqueSlug($this->slug);
		} else {
			$slug = $this->slug;
		}

		$product->update([
			'judul' => $this->judul,
			'harga_asli' => $this->harga_awal,
			'slug' => $slug,
			'harga_diskon' => $this->harga_diskon,
			'stok' => $this->stok,
			'detail' => $this->detail,
			'deskripsi' => $this->deskripsi,
			'pengiriman' => $this->pengiriman == 1 ? 'Cash On Delivery' : '',
			'publish' => 1,
		]);

		if ($this->images) {
			foreach ($this->images as $image) {
				$imageName = 'IMG-' . Str::random(40) . '.' . $image->getClientOriginalExtension();
				$imagePath = $image->storeAs('img/products/', $imageName, 'public');

				DB::table('product_image')->insert([
					'products_id' => $this->productId,
					'image' => $imageName,
					'created_at' => now(),
				]);
			}
		}

		Session::flash('message', 'Berhasil mengupdate produk!');
		return $this->redirect(route('dashboard.products'), navigate: true);
	}

	public function draft()
	{
		$this->validate();

		if ($this->harga_awal <= $this->harga_diskon) {
			return $this->addError('diskon', 'Harga awal harus lebih besar dari harga diskon.');
		}

		$product = Products::find($this->productId);

		if (!$product) {
			return $this->redirect(route('home'));
		}

		if ($this->judul !== $product->judul) {
			$slug = $this->makeUniqueSlug($this->slug);
		} else {
			$slug = $this->slug;
		}

		DB::table('products')->update([
			'judul' => $this->judul,
			'harga_asli' => $this->harga_awal,
			'slug' => $slug,
			'harga_diskon' => $this->harga_diskon,
			'stok' => $this->stok,
			'detail' => $this->detail,
			'deskripsi' => $this->deskripsi,
			'pengiriman' => $this->pengiriman == 1 ? 'Cash On Delivery' : '',
			'publish' => 0,
		]);

		Session::flash('message', 'Berhasil mengupdate draft produk!');
		return $this->redirect(route('dashboard.products'), navigate: true);
	}

	public function render()
	{
		$p = Products::where('slug', $this->getSlug)->first();

		if (!$p) {
			return $this->redirect(route('home'));
		}

		$image = $p->images;

		return view('livewire.products.edit', [
			'products' => $p,
			'image' => $image,
		]);
	}

	protected function makeUniqueSlug($proposedSlug)
	{
		$count = 1;
		$slug = $proposedSlug;

		while (Products::where('slug', $slug)->exists()) {
			$slug = $proposedSlug . '-' . $count;
			$count++;
		}

		return $slug;
	}
}
