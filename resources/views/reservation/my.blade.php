@extends('layouts.app')

@section('title', 'Reservasi Saya - Rental Outdoor')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <h1 class="fw-bold mb-1">
                Reservasi Saya
            </h1>

            <p class="text-muted mb-0">
                Lihat status dan detail reservasi peralatan outdoor kamu.
            </p>
        </div>

        <a
            href="{{ route('home') }}"
            class="btn btn-outline-dark mt-3 mt-md-0"
        >
            ← Kembali ke Beranda
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <strong>Berhasil!</strong>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- RESERVATIONS -->
    @if($reservations->count() > 0)

        <div class="row g-4">

            @foreach($reservations as $reservation)

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <!-- HEADER CARD -->
                            <div class="d-flex justify-content-between align-items-start mb-3">

                                <div>

                                    <h4 class="fw-bold mb-1">
                                        {{ $reservation->equipment->name ?? 'Peralatan' }}
                                    </h4>

                                    <small class="text-muted">
                                        Reservasi #{{ $reservation->id }}
                                    </small>

                                </div>


                                <!-- STATUS -->
                                @if($reservation->status === 'pending')

                                    <span class="badge bg-warning text-dark">
                                        Menunggu Persetujuan
                                    </span>

                                @elseif($reservation->status === 'approved')

                                    <span class="badge bg-success">
                                        Disetujui
                                    </span>

                                @elseif($reservation->status === 'rejected')

                                    <span class="badge bg-danger">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ ucfirst($reservation->status) }}
                                    </span>

                                @endif

                            </div>


                            <hr>


                            <!-- DETAIL -->
                            <div class="row g-3">

                                <div class="col-sm-6">

                                    <small class="text-muted d-block">
                                        Tanggal Mulai
                                    </small>

                                    <strong>
                                        {{ \Carbon\Carbon::parse($reservation->start_date)->format('d/m/Y') }}
                                    </strong>

                                </div>


                                <div class="col-sm-6">

                                    <small class="text-muted d-block">
                                        Tanggal Selesai
                                    </small>

                                    <strong>
                                        {{ \Carbon\Carbon::parse($reservation->end_date)->format('d/m/Y') }}
                                    </strong>

                                </div>


                                <div class="col-sm-6">

                                    <small class="text-muted d-block">
                                        Jumlah Peralatan
                                    </small>

                                    <strong>
                                        {{ $reservation->quantity }} unit
                                    </strong>

                                </div>


                                <div class="col-sm-6">

                                    <small class="text-muted d-block">
                                        Total Harga
                                    </small>

                                    <strong class="text-primary">
                                        Rp {{ number_format($reservation->total_price, 0, ',', '.') }}
                                    </strong>

                                </div>

                            </div>


                            <!-- STATUS INFO -->
                            <div class="mt-4">

                                @if($reservation->status === 'pending')

                                    <div class="alert alert-warning mb-0">

                                        <small>
                                            Reservasi kamu sedang menunggu
                                            persetujuan dari admin.
                                        </small>

                                    </div>

                                @elseif($reservation->status === 'approved')

                                    <div class="alert alert-success mb-0">

                                        <small>
                                            Reservasi telah disetujui oleh admin.
                                            Silakan siapkan pengambilan peralatan
                                            sesuai jadwal.
                                        </small>

                                    </div>

                                @elseif($reservation->status === 'rejected')

                                    <div class="alert alert-danger mb-0">

                                        <small>
                                            Reservasi ini ditolak oleh admin.
                                        </small>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <!-- EMPTY STATE -->
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <div class="display-4 mb-3">
                    📦
                </div>

                <h3 class="fw-bold">
                    Belum Ada Reservasi
                </h3>

                <p class="text-muted mb-4">
                    Kamu belum melakukan reservasi peralatan outdoor.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn btn-primary"
                >
                    Cari Peralatan
                </a>

            </div>

        </div>

    @endif

</div>

@endsection