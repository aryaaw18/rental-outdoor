@extends('layouts.app')

@section('title', 'Kelola Reservasi - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

    <div>

        <h1 class="fw-bold mb-1">
            Kelola Reservasi
        </h1>

        <p class="text-muted mb-0">
            Periksa dan kelola reservasi dari pengguna.
        </p>

    </div>


    <a
        href="{{ route('admin.dashboard') }}"
        class="btn btn-outline-secondary mt-3 mt-md-0"
    >
        ← Dashboard
    </a>

</div>


<!-- SUCCESS -->
@if(session('success'))

    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert"
    >

        <strong>Berhasil!</strong>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
        ></button>

    </div>

@endif


<!-- RESERVATION LIST -->
@if($reservations->count() > 0)

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th class="px-4">
                                No
                            </th>

                            <th>
                                User
                            </th>

                            <th>
                                Peralatan
                            </th>

                            <th>
                                Periode
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($reservations as $reservation)

                            <tr>

                                <!-- NO -->
                                <td class="px-4">
                                    {{ $loop->iteration }}
                                </td>


                                <!-- USER -->
                                <td>

                                    <strong>
                                        {{ $reservation->user->name ?? '-' }}
                                    </strong>

                                    @if($reservation->user)

                                        <br>

                                        <small class="text-muted">
                                            {{ $reservation->user->email }}
                                        </small>

                                    @endif

                                </td>


                                <!-- EQUIPMENT -->
                                <td>

                                    <strong>
                                        {{ $reservation->equipment->name ?? '-' }}
                                    </strong>

                                    @if($reservation->equipment && $reservation->equipment->category)

                                        <br>

                                        <span class="badge bg-secondary mt-1">

                                            {{ $reservation->equipment->category->name }}

                                        </span>

                                    @endif

                                </td>


                                <!-- PERIOD -->
                                <td>

                                    <div>
                                        <small class="text-muted">
                                            Mulai
                                        </small>

                                        <br>

                                        <strong>
                                            {{ \Carbon\Carbon::parse($reservation->start_date)->format('d/m/Y') }}
                                        </strong>
                                    </div>

                                    <div class="mt-2">

                                        <small class="text-muted">
                                            Selesai
                                        </small>

                                        <br>

                                        <strong>
                                            {{ \Carbon\Carbon::parse($reservation->end_date)->format('d/m/Y') }}
                                        </strong>

                                    </div>

                                </td>


                                <!-- QUANTITY -->
                                <td>

                                    <span class="badge bg-info text-dark">

                                        {{ $reservation->quantity }} unit

                                    </span>

                                </td>


                                <!-- TOTAL -->
                                <td>

                                    <strong class="text-primary">

                                        Rp
                                        {{ number_format(
                                            $reservation->total_price,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </strong>

                                </td>


                                <!-- STATUS -->
                                <td>

                                    @if($reservation->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            Pending
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

                                </td>


                                <!-- ACTION -->
                                <td class="text-center">

                                    @if($reservation->status === 'pending')

                                        <div class="d-flex flex-column gap-2">

                                            <!-- APPROVE -->
                                            <form
                                                action="{{ route(
                                                    'admin.reservations.approve',
                                                    $reservation->id
                                                ) }}"
                                                method="POST"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-success w-100"
                                                    onclick="return confirm('Yakin ingin menyetujui reservasi ini?')"
                                                >
                                                    ✓ Setujui
                                                </button>

                                            </form>


                                            <!-- REJECT -->
                                            <form
                                                action="{{ route(
                                                    'admin.reservations.reject',
                                                    $reservation->id
                                                ) }}"
                                                method="POST"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger w-100"
                                                    onclick="return confirm('Yakin ingin menolak reservasi ini?')"
                                                >
                                                    ✕ Tolak
                                                </button>

                                            </form>

                                        </div>

                                    @elseif($reservation->status === 'approved')

                                        <span class="text-success fw-bold">
                                            ✓ Selesai
                                        </span>

                                    @elseif($reservation->status === 'rejected')

                                        <span class="text-danger fw-bold">
                                            ✕ Ditolak
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@else

    <!-- EMPTY STATE -->
    <div class="card border-0 shadow-sm">

        <div class="card-body text-center py-5">

            <div class="display-5 mb-3">
                📋
            </div>

            <h4 class="fw-bold">
                Belum Ada Reservasi
            </h4>

            <p class="text-muted mb-0">
                Belum ada pengguna yang melakukan reservasi.
            </p>

        </div>

    </div>

@endif
```

</div>

@endsection
