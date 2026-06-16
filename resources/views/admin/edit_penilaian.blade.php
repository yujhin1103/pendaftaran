<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Tanda Tangan HRD</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="penilaian-container">

    <h2 align="center">TAMBAH TANDA TANGAN HRD</h2>

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
        </div>

        <!-- Form Tanda Tangan HRD -->
        <form action="/admin/penilaian/{{ $penilaian->id }}/update-hrd" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="signature-container" style="margin-top: 40px;">
                <div class="signature-column">
                    <p style="font-weight: bold; margin-bottom: 10px;">HRD</p>
                    
                    <div class="signature-upload">
                        <label for="tanda_tangan_hrd" class="upload-label">📎 Upload Tanda Tangan HRD</label>
                        <input type="file" name="tanda_tangan_hrd" id="tanda_tangan_hrd" accept="image/*" onchange="previewSignature(event, 'hrd')">
                    </div>

                    <div id="preview-container-hrd" class="preview-container">
                        <img id="signature-preview-hrd" src="" alt="Tanda Tangan HRD">
                    </div>

                    @if($penilaian->tanda_tangan_hrd)
                        <div class="preview-container" style="display: block;">
                            <img src="{{ asset('storage/' . $penilaian->tanda_tangan_hrd) }}" alt="Tanda Tangan HRD">
                        </div>
                    @endif

                    <div class="signature-name">
                        <input type="text" name="nama_penanda_tangan_hrd" id="nama_penanda_tangan_hrd" placeholder="Nama Penanda Tangan HRD" value="{{ $penilaian->nama_penanda_tangan_hrd ?? '' }}" required>
                        <input type="text" name="jabatan_hrd" id="jabatan_hrd" placeholder="Jabatan" value="{{ $penilaian->jabatan_hrd ?? 'HRD' }}" required>
                    </div>
                </div>
            </div>

            <div class="signature-container" style="margin-top: 20px;">
                <div class="signature-column" style="flex: 1;">
                    <p style="font-weight: bold; margin-bottom: 10px;">Dokumen Penilaian</p>
                    <input type="file" name="dokumen_penilaian" id="dokumen_penilaian" accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    @if($penilaian->dokumen_penilaian)
                        <p style="font-size: 12px; color: #555; margin-top: 8px;">
                            Dokumen saat ini: <a href="{{ asset('storage/' . $penilaian->dokumen_penilaian) }}" target="_blank">Lihat dokumen</a>
                        </p>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn-simpan" style="margin-top: 30px;">
                Simpan Tanda Tangan HRD & Dokumen
            </button>
        </form>
    </div>

</div>

<script>
// Function untuk preview tanda tangan
function previewSignature(event, type = 'hrd') {
    const file = event.target.files[0];
    const previewContainer = document.getElementById(`preview-container-${type}`);
    const previewImg = document.getElementById(`signature-preview-${type}`);

    if (file) {
        // Validasi ukuran file
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file tidak boleh lebih dari 2MB');
            event.target.value = '';
            previewContainer.style.display = 'none';
            return;
        }

        // Validasi tipe file
        if (!file.type.startsWith('image/')) {
            alert('Hanya file gambar yang diperbolehkan (JPG, PNG)');
            event.target.value = '';
            previewContainer.style.display = 'none';
            return;
        }

        // Tampilkan preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        // Jika tidak ada file, sembunyikan preview
        previewContainer.style.display = 'none';
    }
}
</script>

</body>
</html>
