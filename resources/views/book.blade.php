@extends('layout')

@section('content')
<div class="flex flex-col w-3/4">
    <div class="flex justify-between">
        <h1 class="font-bold text-3xl">Ticket Details for</h1>
        <h1 class="font-bold text-3xl">{{ $flight->flight_code}}</h1>
    </div>
    <div class="w-full h-[1.5px] bg-black/50 my-2"></div>
    <div class="flex justify-between">
        <p>{{ $flight->origin}}->{{ $flight->destination}}</p>
        <p>Departure  <b>{{ \Carbon\Carbon::parse($flight->departure_time)->format('l, d F Y, H:i') }}</b></p>
        <p>Arrived  <b>{{ \Carbon\Carbon::parse($flight->arrival_time)->format('l, d F Y, H:i') }}</b></p>
    </div>

    {{-- kalau submit file, perlu ini di formnya--}}
    {{-- enctype="multipart/form-data" --}}
    {{-- nampilin gambar:  --}}
    {{-- <img src="{{ asset('storage/' . $photoPath) }}" alt="Uploaded Photo"> --}}

    {{-- dicontroller: --}}
    {{-- $photoPath = $request->file('photo')->store('photos', 'public'); --}}
    {{-- // Simpan ke database kalau perlu
    // Model::create([... 'photo' => $photoPath, ...]); --}}

    <form id="book-flight" class="flex flex-col my-10 space-y-4" enctype="multipart/form-data">
        @csrf

         {{-- Kirim ID flight --}}
        {{-- <input type="hidden" name="flight_id" value="{{ $flight->id }}"> --}}
        {{-- bisa pake cara ini untuk kirim id flight, nnti di request->flight_id --}}
        
        <div class="flex items-center space-x-4 w-[50%]">
            <label for="name" class="w-32 font-semibold">Passenger Name</label>
            <input type="text" id="name" name="name" class="flex-1 border p-2 rounded-md">
        </div>
        <div class="flex items-center space-x-4 w-[50%]">
            <label for="phone" class="w-32 font-semibold">Passenger Phone</label>
            <input type="number" id="phone" name="phone" class="flex-1 border p-2 rounded-md">
        </div>
        <div class="flex items-center space-x-4 w-[50%]">
            <label for="seat" class="w-32 font-semibold">Passenger Phone</label>
            <input type="text" id="seat" name="seat" class="flex-1 border p-2 rounded-md">
        </div>

        <div class="flex justify-end space-x-4">
            <button type="button" onclick="window.location='{{ route('flight.index') }}'" 
             class="font-bold bg-black text-white w-32 py-2 rounded-lg cursor-pointer">
                Cancel
            </button>
            <button type="submit" class="font-bold bg-black text-white w-32 py-2 rounded-lg cursor-pointer">Book Ticket</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script>
    // submit form
    // ini pake ajax (include cdn jquery)
    // $('#book-flight').on('submit', function(e) {
    //     e.preventDefault(); // stop form dari reload
    //     let formData = new FormData(this); // ambil form data termasuk file

    //     $.ajax({
    //         url: "{{ route('ticket.store', $flight->id) }}", // ganti dengan route kamu
    //         method: 'POST',
    //         data: formData,
    //         processData: false,  // harus false untuk FormData
    //         contentType: false,  // harus false juga
    //         success: function(response) {
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Booking Success!',
    //                 text: response.message,
    //             }).then(() => {
    //                 window.location.href = '{{ route("flight.index") }}'; // redirect setelah OK
    //             });
    //         },
    //         error: function(xhr) {
    //             let errors = xhr.responseJSON?.errors;

    //             if (errors) {
    //                 let errorList = Object.values(errors).flat().join('<br>');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Validation Error',
    //                     html: errorList
    //                 });
    //             } else {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Oops...',
    //                     text: 'Something went wrong!'
    //                 });
    //             }
    //         }
    //     });
    // });

    //ini  pake js (fetch)
    const form = document.getElementById('book-flight');
    form.addEventListener('submit', function (e) {
        e.preventDefault(); // prevent normal form submission

        const formData = new FormData(form);

        fetch("{{ route('ticket.store', $flight->id) }}", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) return res.json().then(err => Promise.reject(err));
            return res.json();
        })
        .then(data => {
            Swal.fire("Success", data.message, "success");
        })
        .catch(err => {
            let errorMessages = Object.values(err.errors).flat().join("<br>");
            Swal.fire("Validation Error", errorMessages, "error");
        });
    });
</script>

@endsection