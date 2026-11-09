<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah User - Volt Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar Mobile -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt Logo" height="25">
        </a>

        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>

        <div class="sidebar-inner px-4 pt-3">

            <ul class="nav flex-column pt-3 pt-md-0">

                <!-- Logo -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">

                        <span class="sidebar-icon">
                            <img src="{{ asset('assets-admin/img/brand/light.svg') }}" height="20" width="20"
                                alt="Volt Logo">
                        </span>

                        <span class="mt-1 ms-1 sidebar-text">
                            Volt Overview
                        </span>
                    </a>
                </li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <!-- User -->
                <li class="nav-item active">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <span class="sidebar-text">User</span>
                    </a>
                </li>

            </ul>

        </div>
    </nav>

    <!-- Main Content -->
    <main class="content">

        <!-- Navbar Atas -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">

                <div class="d-flex justify-content-between w-100">

                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Admin Dashboard</h5>
                    </div>

                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <span class="nav-link text-dark">
                                Admin
                            </span>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- Judul Halaman -->
        <div class="py-4">

            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">

                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('user.index') }}">
                            User
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah User
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">

                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah User</h1>

                    <p class="mb-0">
                        Form untuk menambahkan data user baru.
                    </p>
                </div>

                <div>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah User -->
        <div class="row">

            <div class="col-12 mb-4">

                <div class="card border-0 shadow components-section">

                    <div class="card-body">

                        <!-- Form -->
                        <form action="{{ route('user.store') }}" method="POST">

                            @csrf

                            <div class="row mb-4">

                                <!-- Nama -->
                                <div class="col-lg-4 col-sm-6">

                                    <div class="mb-3">

                                        <label for="name" class="form-label">
                                            Nama
                                        </label>

                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>

                                    </div>

                                </div>

                                <!-- Email -->
                                <div class="col-lg-4 col-sm-6">

                                    <div class="mb-3">

                                        <label for="email" class="form-label">
                                            Email
                                        </label>

                                        <input type="email" id="email" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Masukkan email" required>

                                    </div>

                                </div>

                                <!-- Password -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Password
                                        </label>

                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Masukkan password" required>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            Konfirmasi Password
                                        </label>

                                        <input type="password" id="password_confirmation" class="form-control"
                                            name="password_confirmation" placeholder="Ulangi password" required>
                                    </div>
                                </div>

                                <!-- Tombol -->
                                <div>

                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>

                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">
                                        Batal
                                    </a>

                                </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white rounded shadow p-4 mb-4 mt-4">

            <div class="row">

                <div class="col-12 text-center">
                    <p class="mb-0">
                        © 2026 Admin Dashboard - Volt
                    </p>
                </div>

            </div>

        </footer>

    </main>

    <!-- Core JS -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>

    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Volt JS -->
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

</body>

</html>
