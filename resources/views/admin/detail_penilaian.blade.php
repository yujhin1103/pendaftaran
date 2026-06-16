<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Penilaian Peserta Magang</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="penilaian-container">

    <h2 align="center">FORM PENILAIAN PESERTA MAGANG</h2>

    <a href="/admin/penilaian" class="btn-kembali">← Kembali</a>

    <div class="info-peserta">

        <p><strong>Nama :</strong> {{ $penilaian->pendaftaran->nama_lengkap }}</p>

        <p><strong>Asal Sekolah :</strong> {{ $penilaian->pendaftaran->asal_sekolah }}</p>

        <p><strong>Departemen :</strong> {{ $penilaian->pendaftaran->departemen }}</p>

        <p>
            <strong>Periode :</strong>
            {{ $penilaian->pendaftaran->tanggal_mulai }}
            -
            {{ $penilaian->pendaftaran->tanggal_selesai }}
        </p>

    </div>

    <table class="penilaian-table">

    <tr>
        <th width="5%">No</th>
        <th>Kriteria Penilaian</th>
        <th width="15%">Nilai</th>
    </tr>

    <tr class="kategori">
        <td colspan="3">ATTITUDE</td>
    </tr>

    <tr>
        <td>1</td>
        <td>
            <strong>Grooming & Hospitality</strong>
            <p>Ketaatan pada Standard Grooming, menunjukkan perilaku yang mengacu pada value perusahaan.</p>
        </td>
        <td>{{ $penilaian->grooming }}</td>
    </tr>

    <tr>
        <td>2</td>
        <td>
            <strong>Motivation</strong>
            <p>Menunjukkan semangat dan kemauan untuk belajar.</p>
        </td>
        <td>{{ $penilaian->motivation }}</td>
    </tr>

    <tr>
        <td>3</td>
        <td>
            <strong>Responsibility</strong>
            <p>Bekerja secara tuntas sesuai ketentuan yang berlaku.</p>
        </td>
        <td>{{ $penilaian->responsibility }}</td>
    </tr>

    <tr>
        <td>4</td>
        <td>
            <strong>Cooperativeness</strong>
            <p>Menunjukkan perilaku kerja sama dalam tim.</p>
        </td>
        <td>{{ $penilaian->cooperativeness }}</td>
    </tr>

    <tr>
        <td>5</td>
        <td>
            <strong>Attendance</strong>
            <p>Tingkat kehadiran dan ketepatan waktu.</p>
        </td>
        <td>{{ $penilaian->attendance }}</td>
    </tr>

    <tr class="kategori">
        <td colspan="3">KNOWLEDGE & SKILL</td>
    </tr>

    <tr>
        <td>6</td>
        <td>
            <strong>Job Knowledge</strong>
            <p>Pengetahuan tentang bidang tugas.</p>
        </td>
        <td>{{ $penilaian->job_knowledge }}</td>
    </tr>

    <tr>
        <td>7</td>
        <td>
            <strong>Quality of Work</strong>
            <p>Kualitas kerja termasuk ketepatan dan kerapihan.</p>
        </td>
        <td>{{ $penilaian->quality_of_work }}</td>
    </tr>

    <tr>
        <td>8</td>
        <td>
            <strong>Job Speed</strong>
            <p>Dapat mengikuti ritme kerja sesuai ketentuan.</p>
        </td>
        <td>{{ $penilaian->job_speed }}</td>
    </tr>

    <tr>
        <td>9</td>
        <td>
            <strong>Initiative</strong>
            <p>Menunjukkan inisiatif dalam melaksanakan tugas.</p>
        </td>
        <td>{{ $penilaian->initiative }}</td>
    </tr>

    <tr>
        <td>10</td>
        <td>
            <strong>Improvement Achieved</strong>
            <p>Kemajuan yang dicapai selama On The Job Training.</p>
        </td>
        <td>{{ $penilaian->improvement_achieved }}</td>
    </tr>

</table>

<div class="hasil-rating-container">
    <div class="hasil-penilaian">
        <h3>Hasil Penilaian</h3>

        <p>
            <strong>Total Score :</strong>
            <span>{{ $penilaian->total_score }}</span>
        </p>

        <p>
            <strong>Rating :</strong>
            <span>{{ $penilaian->rating }}</span>
        </p>
    </div>

    <div class="rating-info">
        <h4>Scoring 0 - 50</h4>

        <table>
            <tr>
                <td>41 - 50</td>
                <td>Excellent</td>
            </tr>

            <tr>
                <td>31 - 40</td>
                <td>Very Good</td>
            </tr>

            <tr>
                <td>21 - 30</td>
                <td>Good</td>
            </tr>

            <tr>
                <td>11 - 20</td>
                <td>Fair</td>
            </tr>

            <tr>
                <td>0 - 10</td>
                <td>Needs Improvement</td>
            </tr>
        </table>
    </div>
</div>

<!-- Signature Section -->
<div class="signature-section">
    
    <div class="signature-info">
        <p>
            <strong>Lokasi & Tanggal :</strong>
            <span>{{ $penilaian->tempat }}, {{ $penilaian->tanggal_ttd }}</span>
        </p>
    </div>

    <div class="signature-container">
        <!-- Kolom Penanda Tangan Manager -->
        <div class="signature-column">
            <p style="font-weight: bold; margin-bottom: 10px;">Manager/Pimpinan</p>
            @if($penilaian->tanda_tangan_manager)
                <div class="preview-container" style="display: block;">
                    <img src="{{ asset('storage/' . $penilaian->tanda_tangan_manager) }}" alt="Tanda Tangan Manager">
                </div>
            @else
                <p style="color: #999; font-size: 12px;">Belum ada tanda tangan</p>
            @endif

            <div class="signature-name">
                <p><strong>{{ $penilaian->nama_penanda_tangan_manager ?? '-' }}</strong></p>
                <p>{{ $penilaian->jabatan_manager ?? '-' }}</p>
            </div>
        </div>

        <!-- Kolom Penanda Tangan HRD -->
        <div class="signature-column">
            <p style="font-weight: bold; margin-bottom: 10px;">HRD</p>
            @if($penilaian->tanda_tangan_hrd)
                <div class="preview-container" style="display: block;">
                    <img src="{{ asset('storage/' . $penilaian->tanda_tangan_hrd) }}" alt="Tanda Tangan HRD">
                </div>
                <div class="signature-name">
                    <p><strong>{{ $penilaian->nama_penanda_tangan_hrd ?? '-' }}</strong></p>
                    <p>{{ $penilaian->jabatan_hrd ?? '-' }}</p>
                </div>
            @else
                <p style="color: #999; font-size: 12px; margin-bottom: 20px;">Belum ada tanda tangan HRD</p>
                <a href="/admin/penilaian/{{ $penilaian->id }}/edit-hrd" class="btn-nilai" style="display: inline-block;">
                    Tambah Tanda Tangan HRD
                </a>
            @endif
        </div>
    </div>

    @if($penilaian->tanda_tangan_hrd)
        <div style="text-align: center; margin-top: 20px;">
            <a href="/admin/penilaian/{{ $penilaian->id }}/edit-hrd" class="btn-nilai" style="display: inline-block;">
                    Edit Tanda Tangan HRD & Dokumen
                </a>
            </div>
        @else
            <div style="text-align: center; margin-top: 20px;">
                <a href="/admin/penilaian/{{ $penilaian->id }}/edit-hrd" class="btn-nilai" style="display: inline-block; background-color: #ff9800;">
                    Upload Tanda Tangan HRD & Dokumen
                </a>
            </div>
        @endif

        @if($penilaian->dokumen_penilaian)
            <div style="text-align: center; margin-top: 10px;">
                <a href="/admin/penilaian/{{ $penilaian->id }}/download" class="btn-nilai" style="display: inline-block; background-color: #4CAF50;">
                    Unduh Dokumen Penilaian
</div>

</div>

</body>
</html>
