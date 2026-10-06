@extends('layouts.app')

@section('title', 'Dashboard Admin - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

    <div>

        <h1 class="fw-bold mb-1">
            Dashboard Admin
        </h1>

        <p class="text-muted mb-0">
            Kelola sistem penyewaan peralatan outdoor.
        </p>

    </div>


    <div class="mt-3 mt-md-0">

        <a
            href="{{ route('home') }}"
            class="btn btn-outline-dark"
        >
            ← Lihat Website
        </a>

    </div>

</div>


<!-- WELCOME -->
<div class="alert alert-primary border-0 shadow-sm mb-4">

    <h5 class="fw-bold mb-1">
        Selamat datang, {{ Auth::user()->name }}!
    </h5>

    <p class="mb-0">
        Gunakan dashboard ini untuk mengelola kategori,
        peralatan, dan reservasi.
    </p>

</div>


<!-- STATISTICS -->
<div class="row g-4 mb-5">

    <!-- USERS -->
    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <p class="text-muted mb-1">
                    Total User
                </p>

                <h2 class="fw-bold mb-3">
                    {{ $totalUsers }}
                </h2>

                <span class="badge bg-primary">
                    Pengguna
                </span>

            </div>

        </div>

    </div>


    <!-- CATEGORIES -->
    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <p class="text-muted mb-1">
                    Total Kategori
                </p>

                <h2 class="fw-bold mb-3">
                    {{ $totalCategories }}
                </h2>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="btn btn-sm btn-outline-primary"
                >
                    Kelola Kategori
                </a>

            </div>

        </div>

    </div>


    <!-- EQUIPMENT -->
    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <p class="text-muted mb-1">
                    Total Peralatan
                </p>

                <h2 class="fw-bold mb-3">
                    {{ $totalEquipment }}
                </h2>

                <a
                    href="{{ route('admin.equipments.index') }}"
                    class="btn btn-sm btn-outline-primary"
                >
                    Kelola Peralatan
                </a>

            </div>

        </div>

    </div>


    <!-- RESERVATIONS -->
    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <p class="text-muted mb-1">
                    Total Reservasi
                </p>

                <h2 class="fw-bold mb-3">
                    {{ $totalReservations }}
                </h2>

                <a
                    href="{{ route('admin.reservations.index') }}"
                    class="btn btn-sm btn-outline-primary"
                >
                    Kelola Reservasi
                </a>

            </div>

        </div>

    </div>

</div>


<!-- MENU -->
<div class="row g-4 mb-5">

    <!-- CATEGORY -->
    <div class="col-md-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <h4 class="fw-bold">
                    Kelola Kategori
                </h4>

                <p class="text-muted">
                    Tambahkan, ubah, atau hapus kategori
                    peralatan outdoor.
                </p>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="btn btn-dark"
                >
                    Buka Kategori
                </a>

            </div>

        </div>

    </div>


    <!-- EQUIPMENT -->
    <div class="col-md-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <h4 class="fw-bold">
                    Kelola Peralatan
                </h4>

                <p class="text-muted">
                    Atur nama, kategori, harga, stok,
                    dan deskripsi peralatan.
                </p>

                <a
                    href="{{ route('admin.equipments.index') }}"
                    class="btn btn-dark"
                >
                    Buka Peralatan
                </a>

            </div>

        </div>

    </div>


    <!-- RESERVATION -->
    <div class="col-md-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <h4 class="fw-bold">
                    Kelola Reservasi
                </h4>

                <p class="text-muted">
                    Periksa reservasi pengguna dan berikan
                    persetujuan atau penolakan.
                </p>

                <a
                    href="{{ route('admin.reservations.index') }}"
                    class="btn btn-dark"
                >
                    Buka Reservasi
                </a>

            </div>

        </div>

    </div>

</div>


<!-- ACCOUNT -->
<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">

            <div>

                <h4 class="fw-bold mb-3">
                    Informasi Akun
                </h4>

                <p class="mb-1">
                    <strong>Nama:</strong>
                    {{ Auth::user()->name }}
                </p>

                <p class="mb-1">
                    <strong>Email:</strong>
                    {{ Auth::user()->email }}
                </p>

                <p class="mb-0">
                    <strong>Role:</strong>

                    <span class="badge bg-danger">
                        {{ strtoupper(Auth::user()->role) }}
                    </span>
                </p>

            </div>


            <div class="mt-3 mt-md-0">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
