<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'description', 'product_id', 'suggested_price', 'to_user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function get_user_id() {
        return $this->attributes['user_id'];
    }

    public function get_description() {
        return $this->attributes['description'];
    }

    public function get_product_id() {
        return $this->attributes['product_id'];
    }

    public function get_suggested_price() {
        return $this->attributes['suggested_price'];
    }

    public function get_to_user() {
        return $this->attributes['to_user'];
    }

    public function get_id() {
        return $this->attributes['id'];
    }
}
