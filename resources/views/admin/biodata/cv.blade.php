
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV - {{ $biodata->nama }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 15px;
            background: #e9edf3;
            font-family: 'Poppins', sans-serif;
            color: #253047;
        }

        .cv-container {
            width: 100%;
            max-width: 850px;
            min-height: 1050px;
            margin: auto;
            background: #fffdf8;
            display: flex;
            box-shadow: 0 10px 35px rgba(0,0,0,0.12);
            overflow: hidden;
        }

        /* Bagian kiri */
        .sidebar {
            width: 34%;
            background: #203653;
            color: white;
            padding: 55px 25px;
            text-align: center;
        }

        .photo {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #d7bf91;
            margin-bottom: 20px;
        }

        .photo-empty {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: #e9e2d5;
            color: #203653;
            border: 5px solid #d7bf91;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }

        .sidebar h2 {
            font-size: 20px;
            margin: 10px 0;
            overflow-wrap: anywhere;
        }

        .role {
            color: #d7bf91;
            font-size: 13px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .side-section {
            text-align: left;
            margin-top: 45px;
        }

        .side-section h3 {
            font-size: 16px;
            color: #d7bf91;
            border-bottom: 1px solid #8b9bb0;
            padding-bottom: 10px;
            letter-spacing: 1px;
        }

        .side-section p {
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .side-label {
            color: #d7bf91;
            font-weight: 600;
            margin-top: 15px;
        }

        /* Bagian kanan */
        .content {
            width: 66%;
            padding: 65px 45px;
        }

        .small-title {
            font-size: 13px;
            color: #b39668;
            font-weight: 600;
            letter-spacing: 3px;
        }

        .content h1 {
            font-size: 38px;
            line-height: 1.2;
            color: #203653;
            margin: 12px 0;
            overflow-wrap: anywhere;
        }

        .line {
            width: 75px;
            height: 5px;
            background: #d7bf91;
            margin: 25px 0 45px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            font-size: 18px;
            color: #203653;
            border-bottom: 2px solid #d7bf91;
            padding-bottom: 12px;
            margin-bottom: 25px;
        }

        .info {
            margin-bottom: 22px;
        }

        .info label {
            display: block;
            font-size: 12px;
            color: #a18a69;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .info p {
            margin: 0;
            font-size: 15px;
            line-height: 1.8;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .footer {
            margin-top: 70px;
            font-size: 12px;
            color: #999;
        }

        /* Tombol */
        .actions {
            max-width: 850px;
            margin: 25px auto;
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            background: #203653;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-gold {
            background: #b39668;
        }

        @media (max-width: 650px) {
            .cv-container {
                flex-direction: column;
                min-height: auto;
            }

            .sidebar, .content {
                width: 100%;
            }

            .sidebar {
                padding: 35px 25px;
            }

            .content {
                padding: 35px 25px;
            }

            .content h1 {
                font-size: 30px;
            }
        }

        @media print {
            @page {
                size: A4;
                margin: 0;
            }

            body {
                background: white;
                padding: 0;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .cv-container {
                width: 210mm;
                max-width: none;
                min-height: 297mm;
                box-shadow: none;
            }

            .actions {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="cv-container">

    <!-- SIDEBAR KIRI -->
    <div class="sidebar">

        @if($biodata->foto)
            <img
                src="{{ asset('storage/' . $biodata->foto) }}"
                class="photo"
                alt="Foto Profil">
        @else
            <div class="photo-empty">
                Foto Profil
            </div>
        @endif

        <h2>{{ $biodata->nama }}</h2>
        <p class="role">Mahasiswa</p>

        <div class="side-section">
            <h3>KONTAK</h3>

            <p class="side-label">EMAIL</p>
            <p>{{ $biodata->email ?: '-' }}</p>

            <p class="side-label">TELEPON</p>
            <p>{{ $biodata->no_hp ?: '-' }}</p>
        </div>

        <div class="side-section">
            <h3>ALAMAT</h3>
            <p>{{ $biodata->alamat ?: '-' }}</p>
        </div>

    </div>

    <!-- KONTEN KANAN -->
    <div class="content">

        <span class="small-title">
            CURRICULUM VITAE
        </span>

        <h1>{{ $biodata->nama }}</h1>
        <p>Mahasiswa</p>

        <div class="line"></div>

        <div class="section">
            <h2>PROFIL PRIBADI</h2>

            <p style="line-height:1.9;color:#555;">
                Halo, perkenalkan nama saya
                <strong>{{ $biodata->nama }}</strong>.
                Saya merupakan mahasiswa dengan
                Nomor Induk Mahasiswa
                <strong>{{ $biodata->nim ?: '-' }}</strong>.
                Berikut adalah informasi biodata diri saya.
            </p>
        </div>

        <div class="section">
            <h2>BIODATA DIRI</h2>

            <div class="info">
                <label>Nama Lengkap</label>
                <p>{{ $biodata->nama }}</p>
            </div>

            <div class="info">
                <label>Nomor Induk Mahasiswa</label>
                <p>{{ $biodata->nim ?: '-' }}</p>
            </div>

            <div class="info">
                <label>Email</label>
                <p>{{ $biodata->email ?: '-' }}</p>
            </div>

            <div class="info">
                <label>Nomor Telepon</label>
                <p>{{ $biodata->no_hp ?: '-' }}</p>
            </div>

            <div class="info">
                <label>Alamat</label>
                <p>{{ $biodata->alamat ?: '-' }}</p>
            </div>
        </div>

        <div class="footer">
            Curriculum Vitae | Biodata Mahasiswa
        </div>

    </div>

</div>

<!-- TOMBOL -->
<div class="actions">
    <a href="{{ route('biodata.index') }}"
       class="btn">
        Kembali
    </a>

    <a href="{{ route('biodata.edit', $biodata->id) }}"
       class="btn">
        Edit Biodata
    </a>

    <button onclick="window.print()"
            class="btn btn-gold">
        Cetak CV
    </button>
</div>

</body>
</html>
