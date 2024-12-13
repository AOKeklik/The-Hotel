@extends("admin.layout.app")
@section("title","Datewise Room - ". $selected_date)
@section("heading","Datewise Room - ". $selected_date)
@section("button")
<div class="ml-auto">
    <a href="{{ route("admin.datewise-room") }}" class="btn btn-primary"><i class="fa fa-eye"></i> Room Datewise</a>
</div>
@endsection
@section("content")
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Room Name</th>
                                    <th>Total Rooms</th>
                                    <th>Booked Rooms</th>
                                    <th>Available Rooms</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $room->rooms_name }}</td>
                                        <td>{{ $room->total_rooms }}</td>
                                        <td>{{ $room->booked_rooms_count }}</td>
                                        <td>{{ $room->available_rooms }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection