<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferNotification extends Model
{
    use HasFactory;

    protected $fillable = ['from_user', 'to_user', 'product_id', 'received'];
}
