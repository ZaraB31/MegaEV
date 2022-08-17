<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'details', 'link',
    ];

    public function image() {
        return $this->belongsTo(Image::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
