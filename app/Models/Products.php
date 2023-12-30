<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description', 'kraj', 'category', 'user_id'];

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }
}
