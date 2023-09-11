<?php

namespace App\Livewire\Products;

use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Add extends Component
{
	use WithFileUploads;

	public $judul, $detail, $deskripsi, $harga_awal, $harga_diskon, $stok, $pengiriman, $slug;

	public $images = [];
	public $displayedImages = 1;

	public function rules()
	{
		$rules = [
			'judul' => 'required|string',
			'slug' => 'required|unique:products,slug',
			'detail' => 'required|string',
			'deskripsi' => 'required|string',
			'harga_awal' => 'nullable|numeric',
			'harga_diskon' => 'required|numeric',
			'stok' => 'required|numeric',
			'pengiriman' => 'required|string',
		];

		$rules['images.0'] = 'required|image|mimes:jpeg,png,jpg|max:2048';

		for ($i = 1; $i < $this->displayedImages; $i++) {
			$rules["images.$i"] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
		}

		return $rules;
	}

	protected $messages = [
		'images.0.required' => 'The image field is required.',
	];

	public function updatedJudul()
	{
		$baseSlug = Str::slug($this->judul, '-');
		$proposedSlug = $baseSlug;

		$count = 2;
		while (Products::where('slug', $proposedSlug)->exists()) {
			$proposedSlug = $baseSlug . '-' . $count;
			$count++;
		}

		$this->slug = $proposedSlug;

		$this->validateOnly('slug', [
			'slug' => 'unique:products'
		]);
	}

	public function updatedSlug()
	{
		$this->validateOnly('slug', [
			'slug' => 'unique:products'
		]);
	}

	public function updated($propertyName)
	{
		return $this->validateOnly($propertyName);
	}

	public function updatedHargaDiskon()
	{
		if ($this->harga_awal <= $this->harga_diskon) {
			return $this->addError('diskon', 'Harga awal harus lebih besar dari harga diskon.');
		}
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



	public function render()
	{
		return view('livewire.products.add');
	}

	public function save()
	{
		$validatedData = $this->validate();

		if ($this->harga_awal <= $this->harga_diskon) {
			return $this->addError('diskon', 'Harga awal harus lebih besar dari harga diskon.');
		}

		$slug = $this->makeUniqueSlug($this->slug);

		$productId = DB::table('products')->insertGetId([
			'judul' => $this->judul,
			'harga_asli' => $this->harga_awal,
			'slug' => $slug,
			'harga_diskon' => $this->harga_diskon,
			'stok' => $this->stok,
			'detail' => $this->detail,
			'deskripsi' => $this->deskripsi,
			'pengiriman' => $this->pengiriman == 1 ? 'Cash On Delivery' : '',
			'publish' => 1,
			'created_at' => now(),
		]);

		foreach ($this->images as $image) {
			$imageName = 'IMG-' . Str::random(40) . '.' . $image->getClientOriginalExtension();
			$imagePath = $image->storeAs('img/products/', $imageName, 'public');

			DB::table('product_image')->insert([
				'products_id' => $productId,
				'image' => $imageName,
				'created_at' => now(),
			]);
		}

		Session::flash('message', 'Berhasil menambahkan produk!');
		return $this->redirect(route('dashboard.products'), navigate: true);
	}

	public function draft()
	{
		$validatedData = $this->validate();

		if ($this->harga_awal <= $this->harga_diskon) {
			return $this->addError('diskon', 'Harga awal harus lebih besar dari harga diskon.');
		}

		$slug = $this->makeUniqueSlug($this->slug);

		$productId = DB::table('products')->insertGetId([
			'judul' => $this->judul,
			'slug' => $slug,
			'harga_asli' => $this->harga_awal,
			'harga_diskon' => $this->harga_diskon,
			'stok' => $this->stok,
			'detail' => $this->detail,
			'deskripsi' => $this->deskripsi,
			'pengiriman' => $this->pengiriman == 1 ? 'Cash On Delivery' : '',
			'publish' => 0,
		]);


		foreach ($this->images as $image) {
			$imageName = 'IMG-' . Str::random(40) . '.' . $image->getClientOriginalExtension();
			$imagePath = $image->storeAs('img/products/', $imageName, 'public');

			DB::table('product_image')->insert([
				'products_id' => $productId,
				'image' => $imageName,
				'created_at' => now(),
			]);
		}

		Session::flash('message', 'Berhasil menambahkan draft produk!');
		return $this->redirect(route('dashboard.products'), navigate: true);
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
