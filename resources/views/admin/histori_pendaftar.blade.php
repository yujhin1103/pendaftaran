<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Pendaftar Ditolak - Admin Panel</title>

    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    <!-- HEADER NAVIGATION ADMIN STATIS -->
    <div class="admin-header-nav">
        <div class="admin-nav-container">
            <div class="header-user">
                <i class="fa-solid fa-user-shield"></i> Hr_admin
            </div>
            <div class="header-menu-admin">
                <a href="/admin/dashboard"><i class="fa-solid fa-gauge"></i> Home</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-detail-container">
        
        <!-- Tombol Kembali Minimalis -->
        <a href="/admin/dashboard" class="admin-btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>

        <div class="admin-page-header">
            <h1>Histori Pendaftar Ditolak</h1>
            <p>Arsip data pendaftar magang yang tidak memenuhi kriteria seleksi departemen hotel.</p>
        </div>

        <!-- TABEL HISTORI PENDAFTAR DITOLAK -->
        <div class="admin-table-card">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Departemen Seleksi</th>
                        <th>Asal Sekolah / Kampus</th>
                        <th>Kontak Hubung</th>
                        <th style="width: 120px;">Status</th>
                        <th style="text-align: center; width: 160px;">Tindakan Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($histori as $data)
                    <tr>
                        <!-- Nama Lengkap -->
                        <td class="td-primary-name">
                            {{ $data->nama_lengkap }}
                        </td>
                        
                        <!-- Departemen -->
                        <td>
                            <span class="admin-highlight-dept">{{ $data->departemen }}</span>
                        </td>
                        
                        <!-- Asal Sekolah -->
                        <td>{{ $data->asal_sekolah }}</td>
                        
                        <!-- Kontak (Email & No HP) -->
                        <td>
                            <div style="font-size: 1.05rem; color: #443e38;">
                                <i class="fa-regular fa-envelope" style="color: #a38a53; width: 16px;"></i> {{ $data->email }}
                            </div>
                            <div style="font-size: 0.95rem; color: #7a7167; margin-top: 3px;">
                                <i class="fa-solid fa-phone" style="color: #a38a53; width: 16px;"></i> {{ $data->no_hp }}
                            </div>
                        </td>
                        
                        <!-- Status Badge Dingin/Tegas -->
                        <td>
                            <span class="badge-status-doc doc-danger">
                                <i class="fa-solid fa-circle-xmark"></i> Ditolak
                            </span>
                        </td>
                        
                        <!-- Tombol Hapus Permanen -->
                        <td style="text-align: center;">
                            <form action="/admin/pendaftar/hapus/{{ $data->id }}" method="POST" style="display:inline;">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="admin-act-btn btn-act-tolak btn-block-delete" 
                                    onclick="return confirm('Hapus data pendaftar ini? Data yang dihapus tidak dapat dikembalikan.')"
                                >
                                    <i class="fa-solid fa-trash-can"></i> Hapus Arsip
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 50px; color: #7a7167;">
                            <i class="fa-solid fa-box-open" style="font-size: 2.5rem; color: #e1d7c6; display: block; margin-bottom: 12px;"></i>
                            <span style="font-size: 1.2rem; font-weight: 500;">Belum ada pendaftar yang ditolak</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>