@extends('layouts.app')

@section('title', 'Kelola Kategori - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

    <div>

        <h1 class="fw-bold mb-1">
            Kelola Kategori
        </h1>

        <p class="text-muted mb-0">
            Kelola kategori peralatan outdoor yang tersedia.
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
            href="{{ route('admin.categories.create') }}"
            class="btn btn-primary"
        >
            + Tambah Kategori
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


<!-- TABLE CARD -->
<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        @if($categories->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th class="px-4">
                                No
                            </th>

                            <th>
                                Nama Kategori
                            </th>

                            <th>
                                Dibuat
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($categories as $category)

                            <tr>

                                <td class="px-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $category->name }}
                                    </strong>

                                </td>

                                <td>

                                    <span class="text-muted">

                                        {{ $category->created_at
                                            ? $category->created_at->format('d/m/Y')
                                            : '-'
                                        }}

                                    </span>

                                </td>

                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">

                                        <!-- EDIT -->
                                        <a
                                            href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>


                                        <!-- DELETE -->
                                        <form
                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
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

            <!-- EMPTY -->
            <div class="text-center py-5 px-3">

                <div class="display-5 mb-3">
                    📂
                </div>

                <h4 class="fw-bold">
                    Belum Ada Kategori
                </h4>

                <p class="text-muted">
                    Tambahkan kategori pertama untuk peralatan outdoor.
                </p>

                <a
                    href="{{ route('admin.categories.create') }}"
                    class="btn btn-primary"
                >
                    + Tambah Kategori
                </a>

            </div>

        @endif

    </div>

</div>
```

</div>

@endsection
