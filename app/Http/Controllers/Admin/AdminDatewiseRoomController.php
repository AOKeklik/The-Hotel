<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDatewiseRoomController extends Controller
{
    public function index () {
        return view("admin.datewise_room");
    }

    public function submit_datewise_room (Request $request) {
        $request->validate([
            "selected_date" => "required|string",
        ]);

        $selected_date = $request->selected_date;
        $rooms = DB::select("
            select rooms.name as rooms_name,
            rooms.total_rooms as total_rooms,
            count(*) as booked_rooms_count,
            rooms.total_rooms - count(*) as available_rooms
            from booked_rooms
            join rooms
            on rooms.id = booked_rooms.room_id
            where str_to_date(trim(booked_rooms.booking_date), '%d/%m/%Y') = str_to_date('$selected_date','%d/%m/%Y')
            group by rooms.name, rooms.total_rooms
        ");

        return view("admin.datewise_room_submit",compact("rooms","selected_date"));
    }
}
