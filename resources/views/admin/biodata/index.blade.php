
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Biodata Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', sans-serif;
        }

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

        .main {
            margin-left: 240px;
            padding: 40px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .table thead th {
            background: #eef3fa;
            color: #344767;
            padding: 15px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
        }

        .profile-img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn {
            border-radius: 7px;
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

<div class="sidebar">
    <h4>🎓 Student CV</h4>

    <a href="{{ route('biodata.index') }}" class="active">
        Data Biodata
    </a>

    <a href="{{ route('biodata.create') }}">
        Tambah Biodata
    </a>
</div>

<div class="main">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold">Data Biodata Mahasiswa</h2>
            <p class="text-muted">
                Kelola biodata dan Curriculum Vitae mahasiswa
            </p>
        </div>

        <a href="{{ route('biodata.create') }}"
           class="btn btn-primary">
            + Tambah Biodata
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-4">
                <p class="text-muted mb-2">Total Biodata</p>
                <h2 class="fw-bold text-primary">
                    {{ $biodata->count() }}
                </h2>
                <small>Data mahasiswa tersimpan</small>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <h5 class="fw-bold mb-4">Daftar Mahasiswa</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($biodata as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if($item->foto)
                                <img
                                    src="{{ asset('storage/' . $item->foto) }}"
                                    class="profile-img"
                                    alt="Foto">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td class="fw-semibold">
                            {{ $item->nama }}
                        </td>

                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>

                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('biodata.show', $item->id) }}"
                                   class="btn btn-info btn-sm text-white">
                                    Lihat CV
                                </a>

                                <a href="{{ route('biodata.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('biodata.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus biodata ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7"
                            class="text-center text-muted py-5">
                            Belum ada data biodata.
                            Silakan tambahkan data terlebih dahulu.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
