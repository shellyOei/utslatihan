@extends('layout')

@section('content')
<div class="flex flex-col w-3/4">
    <div class="flex justify-between">
        <h1 class="font-bold text-3xl">Ticket Details for {{ $flight->flight_code}}</h1>
        <h1 class="font-bold text-3xl">{{$passenger->count()}} passengers * {{$boarding->count()}} boarding</h1>
    </div>
    <div class="w-full h-[1.5px] bg-black/50 mt-2"></div>
    <div class="flex justify-between">
        clas
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Passenger Name</th>
                <th>Phone</th>
                <th>Seat</th>
                <th>Boarding</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($passenger as $index => $ticket)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $ticket->passenger_name }}</td>
                <td>{{ $ticket->passenger_phone }}</td>
                <td>{{ $ticket->seat_number }}</td>
                <td>
                    @if($ticket->is_boarding)
                        {{ \Carbon\Carbon::parse($ticket->boarding_time)->format('d-m-Y, H:i') }}
                    @else
                        <form action="{{ route('ticket.confirmBoarding', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin konfirmasi boarding?')">
                            @csrf
                            @method('PUT')
                            
                            <button type="submit">Confirm</button>
                        </form>
                    @endif
                </td>
                <td>
                    @if(!$ticket->is_boarding)
                        <form action="{{ route('ticket.delete', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @else
                        <button disabled>Delete</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection

@section('script')

@endsection