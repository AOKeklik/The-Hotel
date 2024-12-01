<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class RoomPhoto extends Model
{
    use HasFactory;

    public function room () {
        return $this->belongsTo(Room::class, "room_id");
    }
}
