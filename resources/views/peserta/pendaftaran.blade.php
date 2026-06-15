<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Magang</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="daftar-body">

<div class="daftar-container">

    <a href="/peserta/home" class="back-btn">
        ←
    </a>

    <form action="/pendaftaran/store" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="top-form">

            <div class="foto-section">

                <h3>Foto Formal :</h3>

                <p class="foto-note">
                    * Foto 3x4 Menggunakan baju rapi, setengah badan.
                </p>

                <div class="upload-foto">

                    <img
                        id="previewFoto"
                        src="{{ asset('images/default-user.png') }}"
                        class="preview-foto"
                    >

                </div>

                <input
                    type="file"
                    name="foto"
                    id="fotoInput"
                    accept="image/*"
                    onchange="previewImage(event)"
                    hidden
                >

                <button type="button" onclick="pilihFoto()">
                    Pilih / Ganti Foto
                </button>
                <button type="button" onclick="hapusFoto()">
                    Hapus Foto
                </button>

            </div>

            <div class="identitas-section">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap">
                </div>

                <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" name="nama_panggilan">
                </div>

               <div class="form-group">
    <label>Departemen</label>

    <select name="departemen" required>
        <option value="">-- Pilih Departemen --</option>

        <option value="ACCOUNTING">ACCOUNTING</option>
        <option value="ACCOUNTING IT">ACCOUNTING IT</option>
        <option value="ENGINEERING">ENGINEERING</option>

        <option value="FBP-BQT">FBP-BQT</option>
        <option value="FBP-GDM">FBP-GDM</option>
        <option value="FBP-MAIN KITCHEN">FBP-MAIN KITCHEN</option>
        <option value="FBP-PASTRY">FBP-PASTRY</option>

        <option value="FBS-BQT">FBS-BQT</option>
        <option value="FBS-PUNIKA">FBS-PUNIKA</option>
        <option value="FBS-RESTO">FBS-RESTO</option>

        <option value="FO">FRONT OFFICE (FO)</option>

        <option value="HK-LAUNDRY">HK-LAUNDRY</option>
        <option value="HK-PA">HK-PA</option>
        <option value="HK-RA">HK-RA</option>

        <option value="HOUSEKEEPING">HOUSEKEEPING</option>
        <option value="HRD">HRD</option>
        <option value="SALES AND MARKETING">SALES AND MARKETING</option>
    </select>
</div>

            </div>

        </div>

        <div class="form-group-full">
            <label>Alamat Rumah</label>
            <input type="text" name="alamat_rumah">
        </div>

        <div class="form-group-full">
            <label>Tempat Tinggal Sekarang</label>
            <input type="text" name="tempat_tinggal">
        </div>

        <div class="form-group-full">
            <label>Asal Sekolah / Universitas</label>
            <input type="text" name="asal_sekolah">
        </div>

        <div class="form-group-full">
            <label>Nomor HP / WA</label>
            <input type="text" name="no_hp">
        </div>

        <div class="form-group-full">
            <label>Alamat Email</label>
            <input type="email" name="email">
        </div>

        <div class="upload-row">
            <label>Upload CV</label>
            <input type="file" name="cv">
        </div>

        <div class="upload-row">
            <label>Upload Surat Izin Magang</label>
            <input type="file" name="surat_izin">
        </div>  

        <div class="btn-area">
            <button type="submit">
                Register
            </button>
        </div>

    </form>

</div>
<script>
function pilihFoto()
{
    document.getElementById('fotoInput').click();
}

function previewImage(event)
{
    const preview = document.getElementById('previewFoto');

    if(event.target.files.length > 0)
    {
        preview.src = URL.createObjectURL(event.target.files[0]);
    }
}
function hapusFoto()
{
    document.getElementById('fotoInput').value = '';

    document.getElementById('previewFoto').src =
        "{{ asset('images/default-user.png') }}";
}

</script>
</body>
</html>