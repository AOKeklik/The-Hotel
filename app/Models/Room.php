<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function roomPhotos () {
        return $this->hasMany(RoomPhoto::class);
    }

    public function orderDetails () {
        return $this->hasMany(OrderDetail::class);
    }

    public function bookedRooms () {
        return $this->hasMany(BookedRoom::class);
    }
}
