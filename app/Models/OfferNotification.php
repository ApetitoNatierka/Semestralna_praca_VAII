<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferNotification extends Model
{
    use HasFactory;

    protected $table = 'offer_notification';
    protected $fillable = ['from_user', 'to_user', 'product_id', 'received', 'offer_id'];

    public function get_from_user() {
        return $this->attributes['from_user'];
    }

    public function get_to_user() {
        return $this->attributes['to_user'];
    }

    public function get_product_id() {
        return $this->attributes['product_id'];
    }

    public function get_received() {
        return $this->attributes['received'];
    }

    public function get_offer_id() {
        return $this->attributes['offer_id'];
    }
}
