<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    protected $fillable = [
      'article_id', 'image_id', 'featured',  
    ];

    public function article() {
      return $this->belongsTo(Article::class);
    }

    public function image() {
      return $this->belongsTo(Image::class);
    }
}
