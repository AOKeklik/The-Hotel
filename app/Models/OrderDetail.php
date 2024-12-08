<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function order () {
        return $this->belongsTo(Order::class, "order_id");
    }

    public function room () {
        return $this->belongsTo(Room::class, "room_id");
    }
}
