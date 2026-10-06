<!DOCTYPE html>
<html>
<head>
    <title>{{ $equipment->name }} - Rental Outdoor</title>
</head>
<body>

<h1>{{ $equipment->name }}</h1>

<p>
    <a href="{{ route('home') }}">
        ← Kembali ke Beranda
    </a>
</p>

<hr>

<h2>Informasi Peralatan</h2>

<p>
    <strong>Kategori:</strong>
    {{ $equipment->category->name ?? '-' }}
</p>

<p>
    <strong>Harga Sewa:</strong>
    Rp {{ number_format($equipment->rental_price, 0, ',', '.') }}
</p>

<p>
    <strong>Stok:</strong>
    {{ $equipment->stock }}
</p>

<p>
    <strong>Deskripsi:</strong>
</p>

<p>
    {{ $equipment->description ?: 'Tidak ada deskripsi.' }}
</p>

<hr>

@if($equipment->stock > 0)

    @auth

        <a href="{{ route('reservation.create', $equipment->id) }}">
            <button type="button">
                Reservasi Sekarang
            </button>
        </a>

    @else

        <p>
            Silakan login terlebih dahulu untuk melakukan reservasi.
        </p>

        <a href="{{ route('login') }}">
            Login
        </a>

    @endauth

@else

    <p>
        <strong>Stok sedang habis.</strong>
    </p>

@endif

</body>
</html>