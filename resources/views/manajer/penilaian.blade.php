<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Peserta Magang - Panel Manajer</title>

    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    <!-- HEADER NAVIGATION MANAJER STATIS -->
    <div class="admin-header-nav" style="border-bottom: 3px solid #8c7643;">
        <div class="admin-nav-container">
            <div class="header-user">
                <i class="fa-solid fa-user-tie"></i> Manajer
            </div>
            <div class="header-menu-admin">
                <a href="/manajer/dashboard"><i class="fa-solid fa-gauge"></i> Home</a>
                <a href="#" onclick="logoutManajer()" class="admin-logout-top"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-detail-container">
        
        <!-- Tombol Kembali Minimalis -->
        <a href="/manajer/dashboard" class="admin-btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>

        <div class="admin-page-header">
            <h1>Penilaian & Evaluasi Peserta Magang</h1>
            <p>Berikan nilai kompetensi praktikum, verifikasi durasi, dan konfirmasi kelayakan sertifikat kelulusan peserta.</p>
        </div>

        <!-- BAR PENCARIAN -->
        <div class="admin-action-bar">
            <form method="GET" action="{{ url('/manajer/penilaian') }}" class="search-form-admin">
                <div class="search-box-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Cari nama peserta..." 
                        value="{{ request('search') }}"
                        class="search-input-admin"
                    >
                </div>
                <button type="submit" class="search-btn-admin" style="background-color: #8c7643;">Cari</button>
            </form>
        </div>

        <!-- TABEL DATA EVALUASI MANAJER -->
        <div class="admin-table-card">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Nama Lengkap Peserta</th>
                        <th>Departemen Penugasan</th>
                        <th>Asal Institusi / Sekolah</th>
                        <th style="width: 150px; text-align: center;">Status Evaluasi</th>
                        <th style="text-align: center; width: 180px;">Tindakan Manajerial</th>
                    </tr>
                </thead>
                <tbody>
                    @if($peserta->count() > 0)
                        @foreach($peserta as $data)
                        <tr>
                            <!-- Nama Lengkap -->
                            <td class="td-primary-name">
                                {{ $data->nama_lengkap }}
                            </td>
                            
                            <!-- Departemen -->
                            <td>
                                <span class="admin-highlight-dept" style="background-color: #f7f4eb; color: #8c7643; border: 1px solid #e3d9bd;">
                                    {{ $data->departemen }}
                                </span>
                            </td>
                            
                            <!-- Asal Sekolah -->
                            <td>
                                <i class="fa-solid fa-graduation-cap" style="color: #8c7643; margin-right: 4px;"></i> 
                                {{ $data->asal_sekolah }}
                            </td>
                            
                            <!-- Status Evaluasi Terintegrasi Model -->
                            @php
                                $penilaian = \App\Models\Penilaian::where('pendaftaran_id', $data->id)->first();
                            @endphp
                            <td style="text-align: center;">
                                @if($penilaian)
                                    <span class="badge-status-doc doc-success">
                                        <i class="fa-solid fa-square-check"></i> Sudah Dinilai
                                    </span>
                                @else
                                    <span class="badge-status-doc doc-danger" style="background-color: #fff8f8; color: #d32f2f; border: 1px solid #ffdde0;">
                                        <i class="fa-solid fa-clock-rotate-left"></i> Belum Dinilai
                                    </span>
                                @endif
                            </td>
                            
                            <!-- Tombol Aksi Dinamik -->
                            <td style="text-align: center;">
                                @if($penilaian)
                                    <button class="admin-act-btn btn-manager-disabled" disabled style="width: 100%; justify-content: center;">
                                        <i class="fa-solid fa-lock"></i> Selesai
                                    </button>
                                @else
                                    <a href="/manajer/form-penilaian/{{ $data->id }}" class="admin-act-btn btn-act-terima" style="background-color: #8c7643; color: white; width: 100%; justify-content: center; box-sizing: border-box;">
                                        <i class="fa-solid fa-file-pen"></i> Beri Nilai
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: #8c7643;">
                                <i class="fa-solid fa-users-slash" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                                Peserta tidak ditemukan atau belum ada data masuk.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    <!-- JAVASCRIPT LOGOUT MANAJER -->
    <script>
    function logoutManajer(){
        let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");
        if(konfirmasi){
            window.location.href = "/manajer/login";
        }
    }
    </script>

</body>
</html>