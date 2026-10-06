<!DOCTYPE html>
<html>

<head>
    <title>Rental Outdoor</title>
</head>

<body>

<h1>Rental Outdoor</h1>

<h2>Katalog Peralatan</h2>

<form method="GET">

<select name="category">

<option value="">
Semua Kategori
</option>

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>

<button type="submit">
Filter
</button>

</form>

<hr>

@foreach($equipments as $equipment)

<div>

@if($equipment->image)

<img
src="{{ asset('images/equipment/' . $equipment->image) }}"
width="200">

@endif

<h3>{{ $equipment->name }}</h3>

<p>
Kategori:
{{ $equipment->category->name ?? '-' }}
</p>

<p>
Rp {{ number_format($equipment->price, 0, ',', '.') }}/hari
</p>

<p>
Stok: {{ $equipment->stock }}
</p>

<a href="{{ route('reservation.create', $equipment->id) }}">
    Sewa Sekarang
</a>

</div>

<hr>

@endforeach

</body>

</html>