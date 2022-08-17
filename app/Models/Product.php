<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'details', 'priceRange', 'brand_id',  
    ];

    public function image() {
      return $this->belongsTo(Image::class);
    }

    public function brand() {
      return $this->belongsTo(brand::class);
    }
}
