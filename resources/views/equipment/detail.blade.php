@extends('layouts.app')

@section('title', $equipment->name . ' - Rental Outdoor')

@section('content')

<div class="container py-5">

    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb" class="mb-4">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>

            <li class="breadcrumb-item active">
                Detail Peralatan
            </li>

        </ol>

    </nav>


    <!-- DETAIL -->
    <div class="row g-5">

        <!-- INFORMASI UTAMA -->
        <div class="col-lg-7">

            <span class="badge bg-secondary mb-3">
                {{ $equipment->category->name ?? 'Tanpa Kategori' }}
            </span>

            <h1 class="fw-bold mb-3">
                {{ $equipment->name }}
            </h1>

            <p class="text-muted fs-5">
                {{ $equipment->description ?: 'Tidak ada deskripsi untuk peralatan ini.' }}
            </p>

            <hr class="my-4">

            <!-- HARGA -->
            <div class="mb-4">

                <p class="text-muted mb-1">
                    Harga Sewa
                </p>

                <h2 class="fw-bold text-primary">

                    Rp {{ number_format($equipment->rental_price, 0, ',', '.') }}

                    <span class="fs-6 text-muted fw-normal">
                        / hari
                    </span>

                </h2>

            </div>


            <!-- STOK -->
            <div class="mb-4">

                <p class="text-muted mb-1">
                    Ketersediaan
                </p>

                @if($equipment->stock > 0)

                    <span class="badge bg-success fs-6">
                        {{ $equipment->stock }} unit tersedia
                    </span>

                @else

                    <span class="badge bg-danger fs-6">
                        Stok Habis
                    </span>

                @endif

            </div>


            <!-- ACTION -->
            @if($equipment->stock > 0)

                @auth

                    <a
                        href="{{ route('reservation.create', $equipment->id) }}"
                        class="btn btn-primary btn-lg"
                    >
                        Reservasi Sekarang
                    </a>

                @else

                    <div class="alert alert-info">

                        Silakan login terlebih dahulu untuk melakukan reservasi.

                    </div>

                    <a
                        href="{{ route('login') }}"
                        class="btn btn-primary"
                    >
                        Login untuk Reservasi
                    </a>

                @endauth

            @else

                <button
                    class="btn btn-secondary btn-lg"
                    disabled
                >
                    Stok Habis
                </button>

            @endif

            <a
                href="{{ route('home') }}"
                class="btn btn-outline-dark btn-lg ms-2"
            >
                Kembali
            </a>

        </div>


        <!-- INFO CARD -->
        <div class="col-lg-5">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Informasi Peralatan
                    </h4>


                    <div class="d-flex justify-content-between border-bottom py-3">

                        <span class="text-muted">
                            Nama
                        </span>

                        <strong>
                            {{ $equipment->name }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between border-bottom py-3">

                        <span class="text-muted">
                            Kategori
                        </span>

                        <strong>
                            {{ $equipment->category->name ?? '-' }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between border-bottom py-3">

                        <span class="text-muted">
                            Harga / Hari
                        </span>

                        <strong>
                            Rp {{ number_format($equipment->rental_price, 0, ',', '.') }}
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between py-3">

                        <span class="text-muted">
                            Stok
                        </span>

                        <strong>
                            {{ $equipment->stock }} unit
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection