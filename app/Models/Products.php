<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	public function images()
	{
		return $this->hasMany(ProductImage::class, 'products_id');
	}

	public function carts()
	{
		return $this->hasMany(Cart::class, 'products_id');
	}

	public function sales()
	{
		return $this->hasMany(Sales::class, 'product_id');
	}
}
