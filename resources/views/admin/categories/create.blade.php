@extends('layouts.app')

@section('title', 'Tambah Kategori - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-md-7 col-lg-6">

        <!-- HEADER -->
        <div class="mb-4">

            <h1 class="fw-bold mb-1">
                Tambah Kategori
            </h1>

            <p class="text-muted mb-0">
                Tambahkan kategori baru untuk peralatan outdoor.
            </p>

        </div>


        <!-- FORM CARD -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <!-- ERROR -->
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Data belum dapat disimpan.
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
                    action="{{ route('admin.categories.store') }}"
                    method="POST"
                >

                    @csrf


                    <!-- NAME -->
                    <div class="mb-4">

                        <label
                            for="name"
                            class="form-label fw-bold"
                        >
                            Nama Kategori
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control form-control-lg"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Tenda"
                            required
                            autofocus
                        >

                        <div class="form-text">
                            Masukkan nama kategori peralatan.
                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg"
                        >
                            Simpan Kategori
                        </button>

                        <a
                            href="{{ route('admin.categories.index') }}"
                            class="btn btn-outline-secondary btn-lg"
                        >
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
