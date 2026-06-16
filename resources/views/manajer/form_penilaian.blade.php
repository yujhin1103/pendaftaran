<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Penilaian Peserta Magang</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="penilaian-container">

    <h2 align="center">FORM PENILAIAN PESERTA MAGANG</h2>

    <a href="/manajer/penilaian" class="btn-kembali">← Kembali</a>

    <div class="info-peserta">

        <p><strong>Nama :</strong> {{ $peserta->nama_lengkap }}</p>

        <p><strong>Asal Sekolah :</strong> {{ $peserta->asal_sekolah }}</p>

        <p><strong>Departemen :</strong> {{ $peserta->departemen }}</p>

        <p>
            <strong>Periode :</strong>
            {{ $peserta->tanggal_mulai }}
            -
            {{ $peserta->tanggal_selesai }}
        </p>

    </div>

    <form action="/manajer/penilaian/simpan/{{ $peserta->id }}" method="POST" enctype="multipart/form-data">

        @csrf

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
        <td><input type="number" name="grooming" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>2</td>
        <td>
            <strong>Motivation</strong>
            <p>Menunjukkan semangat dan kemauan untuk belajar.</p>
        </td>
        <td><input type="number" name="motivation" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>3</td>
        <td>
            <strong>Responsibility</strong>
            <p>Bekerja secara tuntas sesuai ketentuan yang berlaku.</p>
        </td>
        <td><input type="number" name="responsibility" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>4</td>
        <td>
            <strong>Cooperativeness</strong>
            <p>Menunjukkan perilaku kerja sama dalam tim.</p>
        </td>
        <td><input type="number" name="cooperativeness" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>5</td>
        <td>
            <strong>Attendance</strong>
            <p>Tingkat kehadiran dan ketepatan waktu.</p>
        </td>
        <td><input type="number" name="attendance" min="1" max="5" required></td>
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
        <td><input type="number" name="job_knowledge" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>7</td>
        <td>
            <strong>Quality of Work</strong>
            <p>Kualitas kerja termasuk ketepatan dan kerapihan.</p>
        </td>
        <td><input type="number" name="quality_of_work" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>8</td>
        <td>
            <strong>Job Speed</strong>
            <p>Dapat mengikuti ritme kerja sesuai ketentuan.</p>
        </td>
        <td><input type="number" name="job_speed" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>9</td>
        <td>
            <strong>Initiative</strong>
            <p>Menunjukkan inisiatif dalam melaksanakan tugas.</p>
        </td>
        <td><input type="number" name="initiative" min="1" max="5" required></td>
    </tr>

    <tr>
        <td>10</td>
        <td>
            <strong>Improvement Achieved</strong>
            <p>Kemajuan yang dicapai selama On The Job Training.</p>
        </td>
        <td><input type="number" name="improvement_achieved" min="1" max="5" required></td>
    </tr>

</table>

<div class="hasil-rating-container">
    <div class="hasil-penilaian">
        <h3>Hasil Penilaian</h3>

        <p>
            <strong>Total Score :</strong>
            <span id="total_score">0</span>
        </p>

        <p>
            <strong>Rating :</strong>
            <span id="rating">-</span>
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
                    <input type="text" name="tempat" id="tempat" placeholder="Yogyakarta" class="signature-place" required style="width: 150px;">
                    <span>, </span>
                    <input type="date" name="tanggal" id="tanggal" class="signature-date" required>
                </p>
            </div>

            <div class="signature-container">
                <!-- Kolom Penanda Tangan Manager -->
                <div class="signature-column">
                    <div class="signature-upload">
                        <label for="tanda_tangan_manager" class="upload-label">📎 Tanda Tangan Manager/Pimpinan</label>
                        <input type="file" name="tanda_tangan_manager" id="tanda_tangan_manager" accept="image/*" required onchange="previewSignature(event, 'manager')">
                    </div>

                    <div id="preview-container-manager" class="preview-container">
                        <img id="signature-preview-manager" src="" alt="Tanda Tangan Manager">
                    </div>

                    <div class="signature-name">
                        <input type="text" name="nama_penanda_tangan_manager" id="nama_penanda_tangan_manager" placeholder="Nama Penanda Tangan" required>
                        <input type="text" name="jabatan_manager" id="jabatan_manager" placeholder="Jabatan" required>
                    </div>
                </div>
            </div>

            <p style="margin-top: 20px; font-size: 12px; color: #999; text-align: center;">
                Tanda tangan HRD akan ditambahkan oleh Admin
            </p>
        </div>

        <button type="submit" class="btn-simpan">
            Simpan Penilaian
        </button>

    </form>

</div>
<script>

function hitungNilai(){

    let total = 0;

    document.querySelectorAll(
        'input[type="number"]'
    ).forEach(function(input){

        total += parseInt(input.value) || 0;

    });

    document.getElementById(
        'total_score'
    ).innerText = total;

    let rating = '-';

    if(total >= 41){
        rating = 'Excellent';
    }
    else if(total >= 31){
        rating = 'Very Good';
    }
    else if(total >= 21){
        rating = 'Good';
    }
    else if(total >= 11){
        rating = 'Fair';
    }
    else{
        rating = 'Needs Improvement';
    }

    document.getElementById(
        'rating'
    ).innerText = rating;
}

document.querySelectorAll(
    'input[type="number"]'
).forEach(function(input){

    input.addEventListener(
        'input',
        hitungNilai
    );

});

// Function untuk preview tanda tangan
function previewSignature(event, type = 'manager') {
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