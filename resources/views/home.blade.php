@extends('layouts.app')

@section('title', 'Beranda - Rental Outdoor')

@section('content')

<!-- HERO -->
<section class="bg-dark text-white py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <h1 class="display-5 fw-bold">
                    Sewa Peralatan Outdoor
                </h1>

                <p class="lead mt-3">
                    Temukan berbagai peralatan outdoor untuk
                    camping, hiking, dan kegiatan alam lainnya.
                </p>

                @guest

                    <a
                        href="{{ route('register') }}"
                        class="btn btn-primary btn-lg me-2"
                    >
                        Daftar Sekarang
                    </a>

                    <a
                        href="{{ route('login') }}"
                        class="btn btn-outline-light btn-lg"
                    >
                        Login
                    </a>

                @endguest

            </div>

        </div>

    </div>

</section>


<!-- DAFTAR PERALATAN -->
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Peralatan Outdoor
            </h2>

            <p class="text-muted">
                Pilih peralatan yang ingin kamu sewa.
            </p>

        </div>


        @if($equipments->count() > 0)

            <div class="row g-4">

                @foreach($equipments as $equipment)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 shadow-sm border-0">

                            <div class="card-body">

                                <span class="badge bg-secondary mb-2">
                                    {{ $equipment->category->name ?? 'Tanpa Kategori' }}
                                </span>

                                <h4 class="card-title fw-bold">
                                    {{ $equipment->name }}
                                </h4>

                                <p class="text-muted">
                                    {{ $equipment->description ?: 'Tidak ada deskripsi.' }}
                                </p>

                                <hr>

                                <div class="mb-2">

                                    <small class="text-muted">
                                        Harga sewa
                                    </small>

                                    <h5 class="text-primary fw-bold mb-0">

                                        Rp
                                        {{ number_format($equipment->rental_price, 0, ',', '.') }}

                                        <small class="text-muted fw-normal">
                                            / hari
                                        </small>

                                    </h5>

                                </div>

                                <div class="mb-3">

                                    <small class="text-muted">
                                        Stok tersedia
                                    </small>

                                    <p class="mb-0 fw-bold">
                                        {{ $equipment->stock }} unit
                                    </p>

                                </div>


                                <a
                                    href="{{ route('equipment.detail', $equipment->id) }}"
                                    class="btn btn-dark w-100"
                                >
                                    Lihat Detail
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="alert alert-info text-center">

                Belum ada peralatan yang tersedia.

            </div>

        @endif

    </div>

</section>

@endsection