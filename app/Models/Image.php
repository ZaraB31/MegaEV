<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'file', 'description',
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function study() {
        return $this->belongsTo(Study::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
