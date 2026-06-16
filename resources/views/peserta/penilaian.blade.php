<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Magang</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<script>
function logoutConfirm() {
    let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");
    if(konfirmasi){
        window.location.href = "/peserta/logout";
    }
}
</script>

<body>

<header class="home-header">

    <div class="header-left">
        <p>Hello!</p>

        @if(session('username'))
            <h3>{{ session('username') }}</h3>
        @else
            <h3>Guest</h3>
        @endif
    </div>

    <div class="header-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <nav class="header-menu">
        <a href="/peserta/home">Home</a>
        <a href="/peserta/departemen">Department</a>
        <a href="/peserta/profile">Profile</a>
        <a href="/peserta/pendaftaran">Register</a>
        <a href="/peserta/penilaian">Nilai</a>
        <a href="#" onclick="logoutConfirm()">Logout</a>
    </nav>

</header>

<section class="profile-container">

    <h1>Penilaian Magang</h1>

    <div class="profile-card">

        @if($message)
            <div class="alert alert-warning" style="padding: 15px; background-color: #fff3cd; border: 1px solid #ffc107; border-radius: 4px; color: #856404; margin-bottom: 20px;">
                {{ $message }}
            </div>
        @elseif(!$penilaian)
            <div class="alert alert-info" style="padding: 15px; background-color: #d1ecf1; border: 1px solid #bee5eb; border-radius: 4px; color: #0c5460; margin-bottom: 20px;">
                Penilaian Anda belum lengkap ditandatangani oleh Manager dan HRD. Silahkan tunggu sampai proses penilaian selesai.
            </div>
        @else
            <!-- Penilaian Details -->
            <div class="penilaian-info" style="margin-bottom: 30px;">
                <h2 style="border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px;">Hasil Penilaian Magang</h2>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                    <div>
                        <p><strong>Nama Peserta :</strong> {{ $pendaftaran->nama_lengkap }}</p>
                        <p><strong>Departemen :</strong> {{ $pendaftaran->departemen }}</p>
                    </div>
                    <div>
                        <p><strong>Asal Sekolah :</strong> {{ $pendaftaran->asal_sekolah }}</p>
                        <p><strong>Periode :</strong> {{ $pendaftaran->tanggal_mulai }} - {{ $pendaftaran->tanggal_selesai }}</p>
                    </div>
                </div>

                <!-- Nilai dan Rating -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; background-color: #f9f9f9; padding: 20px; border-radius: 8px;">
                    <div>
                        <h3 style="margin-bottom: 10px;">Total Score</h3>
                        <p style="font-size: 32px; font-weight: bold; color: #2c3e50;">{{ $penilaian->total_score }}</p>
                    </div>
                    <div>
                        <h3 style="margin-bottom: 10px;">Rating</h3>
                        <p style="font-size: 32px; font-weight: bold; color: #27ae60;">{{ $penilaian->rating }}</p>
                    </div>
                </div>

                <!-- Scoring Legend -->
                <div style="background-color: #ecf0f1; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                    <h4 style="margin-bottom: 15px;">Scoring 0 - 50</h4>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background-color: #fff;">
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;"><strong>41 - 50</strong></td>
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;">Excellent</td>
                        </tr>
                        <tr style="background-color: #fff;">
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;"><strong>31 - 40</strong></td>
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;">Very Good</td>
                        </tr>
                        <tr style="background-color: #fff;">
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;"><strong>21 - 30</strong></td>
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;">Good</td>
                        </tr>
                        <tr style="background-color: #fff;">
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;"><strong>11 - 20</strong></td>
                            <td style="padding: 8px; border-bottom: 1px solid #bdc3c7;">Fair</td>
                        </tr>
                        <tr style="background-color: #fff;">
                            <td style="padding: 8px;"><strong>0 - 10</strong></td>
                            <td style="padding: 8px;">Needs Improvement</td>
                        </tr>
                    </table>
                </div>

                <!-- Signature Info -->
                <div style="background-color: #f0f8ff; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                    <h4 style="margin-bottom: 15px;">Informasi Penandatanganan</h4>
                    <p><strong>Lokasi & Tanggal :</strong> {{ $penilaian->tempat }}, {{ $penilaian->tanggal_ttd }}</p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 15px;">
                        <div>
                            <p style="font-weight: bold; margin-bottom: 10px; color: #2c3e50;">Penanda Tangan Manager</p>
                            @if($penilaian->tanda_tangan_manager)
                                <div style="border: 1px solid #ddd; padding: 10px; border-radius: 4px; margin-bottom: 10px;">
                                    <img src="{{ asset('storage/' . $penilaian->tanda_tangan_manager) }}" alt="Tanda Tangan Manager" style="max-width: 100%; max-height: 150px;">
                                </div>
                            @endif
                            <p><strong>{{ $penilaian->nama_penanda_tangan_manager ?? '-' }}</strong></p>
                            <p style="color: #7f8c8d;">{{ $penilaian->jabatan_manager ?? '-' }}</p>
                        </div>

                        <div>
                            <p style="font-weight: bold; margin-bottom: 10px; color: #2c3e50;">Penanda Tangan HRD</p>
                            @if($penilaian->tanda_tangan_hrd)
                                <div style="border: 1px solid #ddd; padding: 10px; border-radius: 4px; margin-bottom: 10px;">
                                    <img src="{{ asset('storage/' . $penilaian->tanda_tangan_hrd) }}" alt="Tanda Tangan HRD" style="max-width: 100%; max-height: 150px;">
                                </div>
                            @endif
                            <p><strong>{{ $penilaian->nama_penanda_tangan_hrd ?? '-' }}</strong></p>
                            <p style="color: #7f8c8d;">{{ $penilaian->jabatan_hrd ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Document Download -->
                @if($penilaian->dokumen_penilaian)
                    <div style="background-color: #e8f5e9; padding: 20px; border-radius: 8px; border-left: 4px solid #4caf50;">
                        <h4 style="margin-bottom: 15px; color: #2e7d32;">Dokumen Penilaian</h4>
                        <p style="margin-bottom: 15px; color: #555;">Dokumen penilaian resmi Anda telah tersedia untuk diunduh.</p>
                        <a href="/peserta/penilaian/{{ $penilaian->id }}/download" class="btn-nilai" style="background-color: #4caf50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
                            📥 Unduh Dokumen Penilaian
                        </a>
                    </div>
                @else
                    <div style="background-color: #fff3cd; padding: 20px; border-radius: 8px; border-left: 4px solid #ffc107;">
                        <p style="color: #856404; margin: 0;">Dokumen penilaian sedang diproses. Silahkan cek kembali nanti.</p>
                    </div>
                @endif
            </div>

            <!-- Detail Penilaian Table -->
            <div style="margin-top: 40px;">
                <h3 style="border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px;">Detail Penilaian</h3>
                
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                    <tr style="background-color: #2c3e50; color: white;">
                        <th style="padding: 12px; text-align: left; width: 5%;">No</th>
                        <th style="padding: 12px; text-align: left;">Kriteria Penilaian</th>
                        <th style="padding: 12px; text-align: left; width: 15%;">Nilai</th>
                    </tr>

                    <tr style="background-color: #34495e; color: white;">
                        <td colspan="3" style="padding: 12px;"><strong>ATTITUDE</strong></td>
                    </tr>

                    <tr style="background-color: #ecf0f1;">
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">1</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Grooming & Hospitality</strong><br><small>Ketaatan pada Standard Grooming, menunjukkan perilaku yang mengacu pada value perusahaan.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->grooming }}</td>
                    </tr>

                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">2</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Motivation</strong><br><small>Menunjukkan semangat dan kemauan untuk belajar.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->motivation }}</td>
                    </tr>

                    <tr style="background-color: #ecf0f1;">
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">3</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Responsibility</strong><br><small>Bekerja secara tuntas sesuai ketentuan yang berlaku.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->responsibility }}</td>
                    </tr>

                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">4</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Cooperativeness</strong><br><small>Menunjukkan perilaku kerja sama dalam tim.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->cooperativeness }}</td>
                    </tr>

                    <tr style="background-color: #ecf0f1;">
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">5</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Attendance</strong><br><small>Tingkat kehadiran dan ketepatan waktu.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->attendance }}</td>
                    </tr>

                    <tr style="background-color: #34495e; color: white;">
                        <td colspan="3" style="padding: 12px;"><strong>KNOWLEDGE & SKILL</strong></td>
                    </tr>

                    <tr style="background-color: #ecf0f1;">
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">6</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Job Knowledge</strong><br><small>Pengetahuan tentang bidang tugas.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->job_knowledge }}</td>
                    </tr>

                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">7</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Quality of Work</strong><br><small>Kualitas kerja termasuk ketepatan dan kerapihan.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->quality_of_work }}</td>
                    </tr>

                    <tr style="background-color: #ecf0f1;">
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">8</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Job Speed</strong><br><small>Dapat mengikuti ritme kerja sesuai ketentuan.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->job_speed }}</td>
                    </tr>

                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;">9</td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7;"><strong>Initiative</strong><br><small>Menunjukkan inisiatif dalam melaksanakan tugas.</small></td>
                        <td style="padding: 12px; border-bottom: 1px solid #bdc3c7; font-weight: bold;">{{ $penilaian->initiative }}</td>
                    </tr>

                    <tr style="background-color: #ecf0f1;">
                        <td style="padding: 12px;">10</td>
                        <td style="padding: 12px;"><strong>Improvement Achieved</strong><br><small>Kemajuan yang dicapai selama On The Job Training.</small></td>
                        <td style="padding: 12px; font-weight: bold;">{{ $penilaian->improvement_achieved }}</td>
                    </tr>
                </table>
            </div>

        @endif

    </div>

</section>

</body>
</html>
