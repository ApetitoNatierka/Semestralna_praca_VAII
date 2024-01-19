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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function get_title() {
        return $this->attributes['title'];
    }

    public function get_price() {
        return $this->attributes['price'];
    }

    public function get_description() {
        return $this->attributes['description'];
    }

    public function get_kraj() {
        return $this->attributes['kraj'];
    }

    public function get_category() {
        return $this->attributes['category'];
    }

    public function get_user_id() {
        return $this->attributes['user_id'];
    }

    public function get_id() {
        return $this->attributes['id'];
    }
}
