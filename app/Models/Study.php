<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'. 'content', 'testimony', 'testimonyAuthor',  
    ];

    public function image() {
      return $this->belongsTo(Image::class);
    }
}
