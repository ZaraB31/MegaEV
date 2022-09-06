<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyImage extends Model
{
    use HasFactory;

    protected $fillable = [
      'study_id', 'image_id', 'featured', 
    ];

    public function study() {
      return $this->belongsTo(Study::class);
    }
    
    public function image() {
      return $this->belongsTo(Image::class);
    }
}
