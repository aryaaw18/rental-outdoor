<h1>Kelola Reservasi</h1>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<table border="1">

<tr>
    <th>No</th>
    <th>User</th>
    <th>Equipment</th>
    <th>Mulai</th>
    <th>Selesai</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

@foreach($reservations as $reservation)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $reservation->user->name }}</td>

<td>{{ $reservation->equipment->name }}</td>

<td>{{ $reservation->start_date }}</td>

<td>{{ $reservation->end_date }}</td>

<td>{{ $reservation->quantity }}</td>

<td>
Rp {{ number_format($reservation->total_price, 0, ',', '.') }}
</td>

<td>{{ $reservation->status }}</td>

<td>

@if($reservation->status == 'pending')

<form
action="{{ route('admin.reservations.approve', $reservation->id) }}"
method="POST">

@csrf

<button>
Setujui
</button>

</form>

<form
action="{{ route('admin.reservations.reject', $reservation->id) }}"
method="POST">

@csrf

<button>
Tolak
</button>

</form>

@endif

</td>

</tr>

@endforeach

</table>