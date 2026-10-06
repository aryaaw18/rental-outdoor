@extends('layouts.app')

@section('title', 'Kelola Peralatan - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

    <div>

        <h1 class="fw-bold mb-1">
            Kelola Peralatan
        </h1>

        <p class="text-muted mb-0">
            Kelola peralatan, kategori, harga sewa, dan stok.
        </p>

    </div>


    <div class="d-flex gap-2 mt-3 mt-md-0">

        <a
            href="{{ route('admin.dashboard') }}"
            class="btn btn-outline-secondary"
        >
            ← Dashboard
        </a>

        <a
            href="{{ route('admin.equipments.create') }}"
            class="btn btn-primary"
        >
            + Tambah Peralatan
        </a>

    </div>

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


<!-- EQUIPMENT TABLE -->
<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        @if($equipments->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th class="px-4">
                                No
                            </th>

                            <th>
                                Nama Peralatan
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Harga / Hari
                            </th>

                            <th>
                                Stok
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($equipments as $equipment)

                            <tr>

                                <td class="px-4">
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $equipment->name }}
                                    </strong>

                                    @if($equipment->description)

                                        <br>

                                        <small class="text-muted">

                                            {{ \Illuminate\Support\Str::limit(
                                                $equipment->description,
                                                60
                                            ) }}

                                        </small>

                                    @endif

                                </td>


                                <td>

                                    @if($equipment->category)

                                        <span class="badge bg-secondary">

                                            {{ $equipment->category->name }}

                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <strong class="text-primary">

                                        Rp
                                        {{ number_format(
                                            $equipment->rental_price,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </strong>

                                </td>


                                <td>

                                    @if($equipment->stock > 0)

                                        <span class="badge bg-success">

                                            {{ $equipment->stock }} unit

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            Stok Habis

                                        </span>

                                    @endif

                                </td>


                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">

                                        <!-- EDIT -->
                                        <a
                                            href="{{ route(
                                                'admin.equipments.edit',
                                                $equipment->id
                                            ) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>


                                        <!-- DELETE -->
                                        <form
                                            action="{{ route(
                                                'admin.equipments.destroy',
                                                $equipment->id
                                            ) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus peralatan ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <!-- EMPTY STATE -->
            <div class="text-center py-5 px-3">

                <div class="display-5 mb-3">
                    🎒
                </div>

                <h4 class="fw-bold">
                    Belum Ada Peralatan
                </h4>

                <p class="text-muted">
                    Tambahkan peralatan outdoor agar dapat
                    ditampilkan di katalog user.
                </p>

                <a
                    href="{{ route('admin.equipments.create') }}"
                    class="btn btn-primary"
                >
                    + Tambah Peralatan
                </a>

            </div>

        @endif

    </div>

</div>
```

</div>

@endsection
