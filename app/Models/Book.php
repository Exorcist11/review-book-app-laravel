<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_name', 'author_id', 'publisher_id', 'category_id'];

    public function details()
    {
        return $this->hasOne(BookDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
