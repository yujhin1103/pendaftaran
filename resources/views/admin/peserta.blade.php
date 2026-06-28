<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peserta Magang - Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

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
        
        <a href="/admin/dashboard" class="admin-btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>

        <div class="admin-page-header">
            <h1>Peserta Magang Aktif</h1>
            <p>Daftar seluruh peserta yang sedang atau telah melaksanakan program magang.</p>
        </div>

        <div class="admin-action-bar">
            <form action="/admin/peserta" method="GET" class="search-form-admin">
                <div class="search-box-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Cari peserta magang..." 
                        class="search-input-admin"
                    >
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
                        <th>Periode & Durasi</th>
                        <th>Kondisi</th>
                        <th style="text-align: center; width: 220px;">Aksi Admin</th>
                    </tr>
                </thead>
                <tbody>
                    @if($peserta->count() == 0)
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #a38a53;">
                            <i class="fa-solid fa-folder-open" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Peserta dengan nama tersebut tidak ditemukan.
                        </td>
                    </tr>
                    @endif

                    @foreach($peserta as $data)
                    <tr>
                        <td class="td-primary-name">{{ $data->nama_lengkap }}</td>
                        <td><span class="admin-highlight-dept">{{ $data->departemen }}</span></td>
                        <td>{{ $data->asal_sekolah }}</td>
                        <td>
                            <div class="table-date-info">
                                <i class="fa-regular fa-calendar-days"></i> {{ $data->tanggal_mulai }} - {{ $data->tanggal_selesai }}
                            </div>
                            <small class="duration-badge"><i class="fa-regular fa-clock"></i> {{ $data->durasi_bulan }} Bulan</small>
                        </td>
                        <td>
                            @php
                                $hariIni = \Carbon\Carbon::today();
                            @endphp

                            @if($hariIni->gt(\Carbon\Carbon::parse($data->tanggal_selesai)))
                                <span class="badge-kondisi kondisi-expired">
                                    <i class="fa-solid fa-circle-exclamation"></i> Melebihi Batas
                                </span>
                            @else
                                <span class="badge-kondisi kondisi-aktif">
                                    <i class="fa-solid fa-circle-check"></i> Aktif
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="admin-action-group">
                                <a href="/admin/peserta/edit/{{ $data->id }}" class="admin-act-btn btn-act-detail">
                                    <i class="fa-solid fa-user-pen"></i> Edit
                                </a>

                                <form action="/admin/peserta/selesai/{{ $data->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button 
                                        type="submit" 
                                        class="admin-act-btn btn-act-terima" 
                                        onclick="return confirm('Peserta telah selesai magang?')"
                                    >
                                        <i class="fa-solid fa-graduation-cap"></i> Selesai
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>