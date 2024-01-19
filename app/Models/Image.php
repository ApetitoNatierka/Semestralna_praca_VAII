<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'path'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function get_product_id() {
        return $this->attributes['product_id'];
    }

    public function get_path() {
        return $this->attributes['path'];
    }

    public function get_id() {
        return $this->attributes['id'];
    }
}
