<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;
    protected $fillable = ['bookID', 'release', 'pageCount', 'description', 'image_path'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
