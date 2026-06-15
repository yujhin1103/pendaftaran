<!DOCTYPE html>
<html>

<head>

    <title>Histori Pendaftar Ditolak</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="peserta-body">

<div class="peserta-content">

    <a href="/admin/dashboard" class="kembali-link">
        ← Kembali
    </a>

    <h1 class="peserta-title">
        Histori Pendaftar Ditolak
    </h1>

    @forelse($histori as $data)

        <div class="peserta-card">

            <h3>{{ $data->nama_lengkap }}</h3>

            <p>
                Departemen :
                {{ $data->departemen }}
            </p>

            <p>
                Asal Sekolah :
                {{ $data->asal_sekolah }}
            </p>

            <p>
                Email :
                {{ $data->email }}
            </p>

            <p>
                Nomor HP :
                {{ $data->no_hp }}
            </p>

            <p>
                Status :
                <strong>Ditolak</strong>
            </p>

            <form
                action="/admin/pendaftar/hapus/{{ $data->id }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="btn-hapus"
                    onclick="return confirm('Hapus data pendaftar ini?')">

                    Hapus Permanen

                </button>

            </form>

        </div>

    @empty

        <h3 style="text-align:center;">
            Belum ada pendaftar yang ditolak
        </h3>

    @endforelse

</div>

</body>
</html>