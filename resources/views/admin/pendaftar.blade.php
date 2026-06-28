<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftar - Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    <div class="admin-header-nav">
        <div class="admin-nav-container">
            <div class="header-user">
                <i class="fa-solid fa-user-shield"></i> {{ session('username', 'Hr_admin') }}
            </div>
            <div class="header-menu-admin">
                <a href="/admin/dashboard"><i class="fa-solid fa-gauge"></i> Home</a>
                <a href="#" class="admin-logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-detail-container">
        
        <a href="/admin/dashboard" class="admin-btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>

        <div class="admin-page-header">
            <h1>Daftar Pendaftar Magang</h1>
            <p>Kelola dan tinjau seluruh berkas pengajuan pendaftaran dari calon peserta magang.</p>
        </div>

        <div class="admin-action-bar">
            <form class="search-form-admin" method="GET" action="">
                <div class="search-box-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Cari berdasarkan nama atau sekolah..." class="search-input-admin">
                </div>
                <button type="submit" class="search-btn-admin">Cari</button>
            </form>
        </div>

        <div class="admin-table-card">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Departemen</th>
                        <th>Asal Sekolah / Kampus</th>
                        <th>Status</th>
                        <th style="text-align: center; width: 240px;">Aksi Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftar as $data)
                    <tr>
                        <td class="td-primary-name">{{ $data->nama_lengkap }}</td>
                        <td><span class="admin-highlight-dept">{{ $data->departemen }}</span></td>
                        <td>{{ $data->asal_sekolah }}</td>
                        <td>
                            <span class="admin-status-badge 
                                {{ $data->status == 'Diterima' ? 'badge-success' : ($data->status == 'Menunggu' ? 'badge-warning' : 'badge-danger') }}">
                                {{ $data->status }}
                            </span>
                        </td>
                        <td>
                            <div class="admin-action-group">
                                <a href="/admin/pendaftar/detail/{{ $data->id }}" class="admin-act-btn btn-act-detail">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>

                                <a href="/admin/pendaftar/terima/{{ $data->id }}" class="admin-act-btn btn-act-terima">
                                    <i class="fa-solid fa-check"></i> Terima
                                </a>

                                <form action="/admin/pendaftar/tolak/{{ $data->id }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menolak pendaftar ini?')">
                                    @csrf
                                    <button type="submit" class="admin-act-btn btn-act-tolak">
                                        <i class="fa-solid fa-xmark"></i> Tolak
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if(count($pendaftar) == 0)
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 30px; color: #a38a53;">
                            <i class="fa-solid fa-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Tidak ada data pendaftar yang ditemukan.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>