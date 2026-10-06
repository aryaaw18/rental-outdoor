@extends('layouts.app')

@section('title', 'Edit Peralatan - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-lg-8">

        <!-- HEADER -->
        <div class="mb-4">

            <h1 class="fw-bold mb-1">
                Edit Peralatan
            </h1>

            <p class="text-muted mb-0">
                Perbarui informasi peralatan yang tersedia.
            </p>

        </div>


        <!-- FORM CARD -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-md-5">

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
                    action="{{ route(
                        'admin.equipments.update',
                        $equipment->id
                    ) }}"
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
                            Nama Peralatan
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control form-control-lg"
                            value="{{ old('name', $equipment->name) }}"
                            required
                            autofocus
                        >

                    </div>


                    <!-- CATEGORY -->
                    <div class="mb-4">

                        <label
                            for="category_id"
                            class="form-label fw-bold"
                        >
                            Kategori
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            class="form-select form-select-lg"
                            required
                        >

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $equipment->category_id) == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- PRICE -->
                    <div class="mb-4">

                        <label
                            for="rental_price"
                            class="form-label fw-bold"
                        >
                            Harga Sewa per Hari
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                id="rental_price"
                                name="rental_price"
                                class="form-control"
                                value="{{ old(
                                    'rental_price',
                                    $equipment->rental_price
                                ) }}"
                                min="0"
                                required
                            >

                        </div>

                    </div>


                    <!-- STOCK -->
                    <div class="mb-4">

                        <label
                            for="stock"
                            class="form-label fw-bold"
                        >
                            Stok
                        </label>

                        <div class="input-group input-group-lg">

                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                class="form-control"
                                value="{{ old(
                                    'stock',
                                    $equipment->stock
                                ) }}"
                                min="0"
                                required
                            >

                            <span class="input-group-text">
                                unit
                            </span>

                        </div>

                    </div>


                    <!-- DESCRIPTION -->
                    <div class="mb-4">

                        <label
                            for="description"
                            class="form-label fw-bold"
                        >
                            Deskripsi
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            rows="5"
                            placeholder="Jelaskan kondisi atau informasi mengenai peralatan..."
                        >{{ old('description', $equipment->description) }}</textarea>

                    </div>


                    <!-- BUTTON -->
                    <div class="d-flex flex-column flex-sm-row gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg"
                        >
                            Simpan Perubahan
                        </button>

                        <a
                            href="{{ route('admin.equipments.index') }}"
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
