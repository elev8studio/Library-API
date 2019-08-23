<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Only allow the title, author, pages, published date, ISBN and star rating to get updated via mass assignment
    protected $fillable = ["title", "pages", "published", "isbn", "rating"];
    // public $timestamps = false;
}
