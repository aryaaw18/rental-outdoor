@extends('layouts.app')

@section('title', 'Edit Kategori - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-md-7 col-lg-6">

        <!-- HEADER -->
        <div class="mb-4">

            <h1 class="fw-bold mb-1">
                Edit Kategori
            </h1>

            <p class="text-muted mb-0">
                Perbarui informasi kategori peralatan outdoor.
            </p>

        </div>


        <!-- FORM CARD -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <!-- ERROR -->
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Data belum dapat diperbarui.
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
                    action="{{ route('admin.categories.update', $category->id) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


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
                            value="{{ old('name', $category->name) }}"
                            required
                            autofocus
                        >

                        <div class="form-text">
                            Ubah nama kategori sesuai kebutuhan.
                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg"
                        >
                            Simpan Perubahan
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
