
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Biodata Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #172b4d;
            color: white;
            position: fixed;
            padding: 30px 20px;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #dbe5f4;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #304b75;
            color: white;
        }

        /* Konten */
        .main {
            margin-left: 240px;
            padding: 40px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .form-label {
            font-weight: 600;
            color: #344767;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dce3ed;
        }

        .form-control:focus {
            border-color: #5a8dee;
            box-shadow: 0 0 0 0.2rem rgba(90,141,238,0.15);
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>🎓 Student CV</h4>

    <a href="{{ route('biodata.index') }}">
        Data Biodata
    </a>

    <a href="{{ route('biodata.create') }}" class="active">
        Tambah Biodata
    </a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <div class="mb-4">
        <h2 class="fw-bold">Tambah Biodata Mahasiswa</h2>
        <p class="text-muted">
            Lengkapi informasi diri untuk membuat Curriculum Vitae
        </p>
    </div>

    <div class="card p-4 p-md-5">

        <h5 class="fw-bold mb-4">
            Form Biodata Mahasiswa
        </h5>

        <!-- Validasi Error -->
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('biodata.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row g-4">

                <!-- Nama -->
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama lengkap"
                           value="{{ old('nama') }}"
                           required>
                </div>

                <!-- NIM -->
                <div class="col-md-6">
                    <label class="form-label">NIM</label>
                    <input type="text"
                           name="nim"
                           class="form-control"
                           placeholder="Masukkan NIM"
                           value="{{ old('nim') }}">
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="contoh@email.com"
                           value="{{ old('email') }}">
                </div>

                <!-- No HP -->
                <div class="col-md-6">
                    <label class="form-label">Nomor HP</label>
                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           placeholder="Masukkan nomor HP"
                           value="{{ old('no_hp') }}">
                </div>

                <!-- Alamat -->
                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              rows="3"
                              placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                </div>

                <!-- Foto -->
                <div class="col-12">
                    <label class="form-label">Foto Profil</label>
                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">

                    <small class="text-muted">
                        Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                    </small>
                </div>

            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-2 mt-5">

                <a href="{{ route('biodata.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Simpan Biodata
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
