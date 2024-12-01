<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomPhoto;

class Room extends Model
{
    use HasFactory;

    public function roomPhotos () {
        return $this->hasMany(RoomPhoto::class);
    }
}
