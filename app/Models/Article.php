<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'details', 'draft',
    ];

    public function image() {
        return $this->belongsTo(ArticleImage::class);
    }
}
