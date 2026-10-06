<!DOCTYPE html>

<html lang="id">

<head>

```
<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<meta
    name="description"
    content="Sistem Informasi Penyewaan Peralatan Outdoor"
>

<title>
    @yield('title', 'Rental Outdoor')
</title>

<!-- Bootstrap -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
>
```

</head>

<body class="bg-light d-flex flex-column min-vh-100">

<!-- ========================= -->

<!-- NAVBAR -->

<!-- ========================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

```
<div class="container">

    <!-- BRAND -->
    <a
        class="navbar-brand fw-bold"
        href="{{ route('home') }}"
    >
        🏕️ Rental Outdoor
    </a>


    <!-- MOBILE TOGGLE -->
    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarMenu"
        aria-controls="navbarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >

        <span class="navbar-toggler-icon"></span>

    </button>


    <!-- MENU -->
    <div
        class="collapse navbar-collapse"
        id="navbarMenu"
    >

        <!-- LEFT MENU -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


            <!-- HOME -->
            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('home') }}"
                >
                    Home
                </a>

            </li>


            @auth

                <!-- RESERVATION -->
                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('reservations.my') }}"
                    >
                        Reservasi Saya
                    </a>

                </li>


                @if(Auth::user()->role === 'admin')

                    <!-- ADMIN -->
                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="{{ route('admin.dashboard') }}"
                        >
                            Dashboard Admin
                        </a>

                    </li>

                @endif

            @endauth

        </ul>


        <!-- RIGHT MENU -->
        <ul class="navbar-nav align-items-lg-center">


            @auth

                <!-- USER -->
                <li class="nav-item">

                    <span class="nav-link text-white">

                        Halo,
                        <strong>
                            {{ Auth::user()->name }}
                        </strong>

                    </span>

                </li>


                <!-- LOGOUT -->
                <li class="nav-item">

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-inline"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm mt-1 mt-lg-0"
                        >
                            Logout
                        </button>

                    </form>

                </li>


            @else

                <!-- LOGIN -->
                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('login') }}"
                    >
                        Login
                    </a>

                </li>


                <!-- REGISTER -->
                <li class="nav-item">

                    <a
                        class="btn btn-primary btn-sm mt-1 mt-lg-0"
                        href="{{ route('register') }}"
                    >
                        Daftar
                    </a>

                </li>

            @endauth


        </ul>

    </div>

</div>
```

</nav>

<!-- ========================= -->

<!-- MAIN CONTENT -->

<!-- ========================= -->

<main class="flex-grow-1">

```
@yield('content')
```

</main>

<!-- ========================= -->

<!-- FOOTER -->

<!-- ========================= -->

<footer class="bg-dark text-white mt-5">

```
<div class="container py-5">

    <div class="row g-4">


        <!-- ABOUT -->
        <div class="col-md-6">

            <h5 class="fw-bold">
                🏕️ Rental Outdoor
            </h5>

            <p class="text-secondary mb-0">

                Sistem informasi penyewaan peralatan
                outdoor untuk membantu pengguna menemukan
                dan melakukan reservasi peralatan dengan
                lebih mudah.

            </p>

        </div>


        <!-- QUICK MENU -->
        <div class="col-md-3">

            <h6 class="fw-bold">
                Menu
            </h6>

            <ul class="list-unstyled mb-0">

                <li class="mb-2">

                    <a
                        href="{{ route('home') }}"
                        class="text-secondary text-decoration-none"
                    >
                        Home
                    </a>

                </li>


                @auth

                    <li class="mb-2">

                        <a
                            href="{{ route('reservations.my') }}"
                            class="text-secondary text-decoration-none"
                        >
                            Reservasi Saya
                        </a>

                    </li>

                @else

                    <li class="mb-2">

                        <a
                            href="{{ route('login') }}"
                            class="text-secondary text-decoration-none"
                        >
                            Login
                        </a>

                    </li>

                @endauth

            </ul>

        </div>


        <!-- INFO -->
        <div class="col-md-3">

            <h6 class="fw-bold">
                Informasi
            </h6>

            <p class="text-secondary mb-1">
                Penyewaan Peralatan Outdoor
            </p>

            <p class="text-secondary mb-0">
                Berbasis Web
            </p>

        </div>

    </div>

</div>


<!-- COPYRIGHT -->
<div class="border-top border-secondary">

    <div class="container py-3">

        <p class="text-secondary text-center mb-0">

            © {{ date('Y') }}
            Rental Outdoor.
            All rights reserved.

        </p>

    </div>

</div>
```

</footer>

<!-- Bootstrap JavaScript -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
