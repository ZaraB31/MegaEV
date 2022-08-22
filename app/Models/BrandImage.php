<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    use HasFactory;

    protected $fillable = [
      'brand_id', 'image_id',  
    ];

    public function brand() {
      return $this->belongsTo(Brand::class);
    }

    public function image() {
      return $this->belongsTo(Image::class);
    }
}
