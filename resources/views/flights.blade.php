@extends('layout')

@section('content')
<div id="flights" class="grid md:grid-cols-3 gap-4">
    @foreach ($flights as $flight)

    <div class="flex flex-col rounded-3xl w-[350px] bg-[#ffffff] shadow-xl">
        <div class="flex flex-col p-8">
            <div class="flex justify-between">
                <div class="text-2xl font-bold text-black pb-6">{{ $flight->flight_code}}</div>
                <div class="text-lg text-[#374151] pb-6">{{ $flight->origin}}->{{$flight->destination}}</div>
            </div>
            <p>Departure</p>
            <p class="font-bold text-lg">{{ \Carbon\Carbon::parse($flight->departure_time)->format('l, d F Y, H:i') }}</p>
            <p>Arrived</p>
            <p class="font-bold text-lg">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, d F Y, H:i') }}</p>

            <div class="flex justify-between pt-6 space-x-4">
                <a href="{{ route('flight.book', $flight->id) }}" 
                    class="bg-[#7e22ce] text-[#ffffff] w-full text-center font-bold text-base p-3 rounded-lg hover:bg-purple-800 active:scale-95 transition-transform transform">
                     Book Ticket
                 </a>
                 
                 <a href="{{ route('flight.detail', $flight->id) }}" 
                    class="bg-[#7e22ce] text-[#ffffff] w-full text-center font-bold text-base p-3 rounded-lg hover:bg-purple-800 active:scale-95 transition-transform transform">
                     View Details
                 </a>
            </div>
        </div>
    </div>

    @endforeach
    
</div>
@endsection

@section('script')
<script>
    let flights = @json($flights);
</script>
@endsection