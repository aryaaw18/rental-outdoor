@extends('layouts.app')

@section('title', 'Daftar - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-md-7 col-lg-6">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-md-5">

                <!-- HEADER -->
                <div class="text-center mb-4">

                    <h2 class="fw-bold">
                        Buat Akun
                    </h2>

                    <p class="text-muted mb-0">
                        Daftar untuk mulai menyewa peralatan outdoor.
                    </p>

                </div>


                <!-- ERROR -->
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Pendaftaran gagal.
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


                <!-- FORM -->
                <form
                    action="{{ route('register.process') }}"
                    method="POST"
                >

                    @csrf


                    <!-- NAME -->
                    <div class="mb-3">

                        <label
                            for="name"
                            class="form-label fw-bold"
                        >
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control form-control-lg"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            autofocus
                        >

                    </div>


                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label
                            for="email"
                            class="form-label fw-bold"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control form-control-lg"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            required
                        >

                    </div>


                    <!-- PASSWORD -->
                    <div class="mb-3">

                        <label
                            for="password"
                            class="form-label fw-bold"
                        >
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control form-control-lg"
                            placeholder="Minimal 6 karakter"
                            required
                        >

                    </div>


                    <!-- CONFIRM PASSWORD -->
                    <div class="mb-4">

                        <label
                            for="password_confirmation"
                            class="form-label fw-bold"
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control form-control-lg"
                            placeholder="Ulangi password"
                            required
                        >

                    </div>


                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="btn btn-primary btn-lg w-100"
                    >
                        Daftar Sekarang
                    </button>

                </form>


                <!-- LOGIN -->
                <div class="text-center mt-4">

                    <p class="text-muted mb-0">
                        Sudah punya akun?
                    </p>

                    <a
                        href="{{ route('login') }}"
                        class="fw-bold text-decoration-none"
                    >
                        Login di sini
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
