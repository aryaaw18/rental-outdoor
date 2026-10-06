<h1>Reservasi {{ $equipment->name }}</h1>

@if(session('error'))
<p>{{ session('error') }}</p>
@endif

<form action="{{ route('reservation.store') }}"
      method="POST">

@csrf

<input
type="hidden"
name="equipment_id"
value="{{ $equipment->id }}">

<label>Tanggal Mulai</label>

<input
type="date"
name="start_date">

<br><br>

<label>Tanggal Selesai</label>

<input
type="date"
name="end_date">

<br><br>

<label>Jumlah</label>

<input
type="number"
name="quantity"
min="1"
max="{{ $equipment->stock }}">

<br><br>

<button type="submit">
Buat Reservasi
</button>

</form>