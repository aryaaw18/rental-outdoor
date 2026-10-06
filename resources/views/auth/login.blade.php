@extends('layouts.app')

@section('title', 'Login - Rental Outdoor')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-md-6 col-lg-5">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-md-5">

                <!-- HEADER -->
                <div class="text-center mb-4">

                    <h2 class="fw-bold">
                        Login
                    </h2>

                    <p class="text-muted mb-0">
                        Masuk ke akun Rental Outdoor kamu.
                    </p>

                </div>


                <!-- ERROR -->
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Login gagal.
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
                    action="{{ route('login.process') }}"
                    method="POST"
                >

                    @csrf


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
                            placeholder="Masukkan email"
                            required
                            autofocus
                        >

                    </div>


                    <!-- PASSWORD -->
                    <div class="mb-4">

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
                            placeholder="Masukkan password"
                            required
                        >

                    </div>


                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="btn btn-primary btn-lg w-100"
                    >
                        Login
                    </button>

                </form>


                <!-- REGISTER -->
                <div class="text-center mt-4">

                    <p class="text-muted mb-0">
                        Belum punya akun?
                    </p>

                    <a
                        href="{{ route('register') }}"
                        class="fw-bold text-decoration-none"
                    >
                        Daftar sekarang
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
