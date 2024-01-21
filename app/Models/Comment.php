<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'product_id', 'user_id'];


    public function get_comment() {
        return $this->attributes['comment'];
    }

    public function get_product_id() {
        return $this->attributes['product_id'];
    }

    public function get_user_id() {
        return $this->attributes['user_id'];
    }

    public function get_id() {
        return $this->attributes['id'];
    }
}
