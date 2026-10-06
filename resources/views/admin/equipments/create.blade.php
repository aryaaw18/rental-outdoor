@extends('layouts.app')

@section('title', 'Tambah Peralatan - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-lg-8">

        <!-- HEADER -->
        <div class="mb-4">

            <h1 class="fw-bold mb-1">
                Tambah Peralatan
            </h1>

            <p class="text-muted mb-0">
                Tambahkan peralatan outdoor baru ke dalam katalog.
            </p>

        </div>


        <!-- FORM CARD -->
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-md-5">

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
                    action="{{ route('admin.equipments.store') }}"
                    method="POST"
                >

                    @csrf


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
                            value="{{ old('name') }}"
                            placeholder="Contoh: Tenda Dome 4 Orang"
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
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
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
```
