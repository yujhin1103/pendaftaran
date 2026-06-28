<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Departemen - Admin Panel</title>

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
            <h1>Kelola Departemen & Kuota Magang</h1>
            <p>Atur kapasitas kuota pendaftaran, jumlah peserta terisi, serta status ketersediaan masing-masing departemen hotel.</p>
        </div>

        <div class="admin-table-card">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Nama Departemen</th>
                        <th style="width: 150px;">Kuota Maksimal</th>
                        <th style="width: 150px;">Jumlah Terisi</th>
                        <th style="width: 200px;">Status Ketersediaan</th>
                        <th style="text-align: center; width: 140px;">Konfirmasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departemens as $departemen)
                    <tr>
                        <form action="/admin/departemen/update/{{ $departemen->id }}" method="POST">
                            @csrf
                            
                            <td class="td-primary-name">
                                <i class="fa-solid fa-hotel" style="color: #a38a53; margin-right: 8px;"></i>
                                {{ $departemen->nama_departemen }}
                            </td>
                            
                            <td>
                                <div class="admin-input-group-table">
                                    <input 
                                        type="number" 
                                        name="kuota" 
                                        value="{{ $departemen->kuota }}" 
                                        class="table-form-input"
                                        min="0"
                                        required
                                    >
                                    <span class="input-unit-label">Slot</span>
                                </div>
                            </td>
                            
                            <td>
                                <div class="admin-input-group-table">
                                    <input 
                                        type="number" 
                                        name="jumlah_terisi" 
                                        value="{{ $departemen->jumlah_terisi }}" 
                                        class="table-form-input"
                                        min="0"
                                        required
                                    >
                                    <span class="input-unit-label">Orang</span>
                                </div>
                            </td>
                            
                            <td>
                                <div class="table-select-wrapper">
                                    <select name="status" class="table-form-select 
                                        {{ $departemen->status == 'Tersedia' ? 'select-status-available' : 'select-status-full' }}">
                                        <option value="Tersedia" {{ $departemen->status == 'Tersedia' ? 'selected' : '' }}>
                                            🟢 Tersedia
                                        </option>
                                        <option value="Full" {{ $departemen->status == 'Full' ? 'selected' : '' }}>
                                            🔴 Full / Penuh
                                        </option>
                                    </select>
                                </div>
                            </td>
                            
                            <td style="text-align: center;">
                                <button type="submit" class="admin-act-btn btn-act-terima btn-block-submit" title="Simpan Perubahan">
                                    <i class="fa-solid fa-floppy-disk"></i> Simpan
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>