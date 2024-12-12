<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookedRoom extends Model
{
    use HasFactory;

    public function room () {
        return $this->belongsTo(Room::class, "room_id");
    }
}
