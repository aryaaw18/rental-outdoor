@extends('layouts.app')

@section('title', 'Reservasi ' . $equipment->name)

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

            <li class="breadcrumb-item">
                <a href="{{ route('equipment.detail', $equipment->id) }}">
                    {{ $equipment->name }}
                </a>
            </li>

            <li class="breadcrumb-item active">
                Reservasi
            </li>

        </ol>

    </nav>


    <div class="row g-4">

        <!-- FORM -->
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-2">
                        Reservasi Peralatan
                    </h2>

                    <p class="text-muted mb-4">
                        Isi data reservasi sesuai kebutuhan kamu.
                    </p>


                    <!-- ERROR -->
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Reservasi gagal.
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route('reservation.store') }}"
                        method="POST"
                    >

                        @csrf


                        <!-- EQUIPMENT -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Peralatan
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $equipment->name }}"
                                readonly
                            >

                            <input
                                type="hidden"
                                name="equipment_id"
                                value="{{ $equipment->id }}"
                            >

                        </div>


                        <!-- START DATE -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                class="form-control"
                                value="{{ old('start_date') }}"
                                min="{{ date('Y-m-d') }}"
                                required
                            >

                        </div>


                        <!-- END DATE -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Tanggal Selesai
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                class="form-control"
                                value="{{ old('end_date') }}"
                                min="{{ date('Y-m-d') }}"
                                required
                            >

                        </div>


                        <!-- QUANTITY -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Jumlah Peralatan
                            </label>

                            <input
                                type="number"
                                name="quantity"
                                class="form-control"
                                value="{{ old('quantity', 1) }}"
                                min="1"
                                max="{{ $equipment->stock }}"
                                required
                            >

                            <div class="form-text">
                                Maksimal {{ $equipment->stock }} unit.
                            </div>

                        </div>


                        <!-- BUTTON -->
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg"
                            >
                                Ajukan Reservasi
                            </button>

                            <a
                                href="{{ route('equipment.detail', $equipment->id) }}"
                                class="btn btn-outline-secondary btn-lg"
                            >
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- SUMMARY -->
        <div class="col-lg-5">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        Ringkasan Peralatan
                    </h4>


                    <h5 class="fw-bold">
                        {{ $equipment->name }}
                    </h5>

                    <p class="text-muted">
                        {{ $equipment->category->name ?? 'Tanpa Kategori' }}
                    </p>

                    <hr>


                    <div class="d-flex justify-content-between mb-3">

                        <span>
                            Harga sewa
                        </span>

                        <strong>
                            Rp {{ number_format($equipment->rental_price, 0, ',', '.') }}
                            / hari
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between mb-3">

                        <span>
                            Stok tersedia
                        </span>

                        <strong>
                            {{ $equipment->stock }} unit
                        </strong>

                    </div>


                    <hr>


                    <div class="alert alert-info mb-0">

                        <small>
                            Total harga akan dihitung otomatis
                            berdasarkan jumlah peralatan dan lama
                            masa sewa.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection