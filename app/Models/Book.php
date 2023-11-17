<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'comment', 'rating'];

    public function details()
    {
        return $this->hasOne(BookDetail::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
