<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyImage extends Model
{
    use HasFactory;

    protected $fillable = [
      'study_id', 'image_id',  
    ];

    public function study() {
      return $this->hasMany(Study::class);
    }
    
    public function image() {
      return $this->hasMany(Image::class);
    }
}
