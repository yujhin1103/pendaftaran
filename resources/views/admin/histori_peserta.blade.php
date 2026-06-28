<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Peserta Magang (Alumni) - Admin Panel</title>

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
            <h1>Histori Alumni Peserta Magang</h1>
            <p>Daftar seluruh peserta yang telah menyelesaikan seluruh program magang secara resmi di hotel.</p>
        </div>

        <div class="admin-table-card">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Departemen Alumni</th>
                        <th>Asal Sekolah / Kampus</th>
                        <th>Periode Magang</th>
                        <th style="width: 120px;">Status</th>
                        <th style="text-align: center; width: 160px;">Tindakan Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($histori) == 0)
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #a38a53;">
                            <i class="fa-solid fa-user-graduate" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Belum ada data alumni peserta magang yang selesai.
                        </td>
                    </tr>
                    @endif

                    @foreach($histori as $data)
                    <tr>
                        <td class="td-primary-name">
                            {{ $data->nama_lengkap }}
                        </td>
                        
                        <td>
                            <span class="admin-highlight-dept">{{ $data->departemen }}</span>
                        </td>
                        
                        <td>{{ $data->asal_sekolah }}</td>
                        
                        <td>
                            <div class="table-date-info">
                                <i class="fa-regular fa-calendar-check"></i> {{ $data->tanggal_mulai }} - {{ $data->tanggal_selesai }}
                            </div>
                        </td>
                        
                        <td>
                            <span class="badge-status-doc doc-success" style="background-color: #f0ebd9; color: #735f32; border: 1px solid #e3d9bd;">
                                <i class="fa-solid fa-graduation-cap"></i> Alumni
                            </span>
                        </td>
                        
                        <td style="text-align: center;">
                            <form action="/admin/histori-peserta/hapus/{{ $data->id }}" method="POST" style="display:inline;">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="admin-act-btn btn-act-tolak btn-block-delete" 
                                    onclick="return confirm('Yakin ingin menghapus data alumni ini?')"
                                >
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>