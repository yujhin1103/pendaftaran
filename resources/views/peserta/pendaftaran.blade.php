<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta Magang - Royal Ambarrukmo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="home-header">
        <div class="header-container">
            <div class="header-left">
                <div class="user-avatar">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="user-text">
                    <span>Hello,</span>
                    @if(session('username'))
                        <h3>{{ session('username') }}</h3>
                    @else
                        <h3>Guest</h3>
                    @endif
                </div>
            </div>

            <div class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Royal Ambarrukmo Logo">
            </div>

            <nav class="header-menu">
                <a href="/peserta/home" class="menu-item"><i class="fa-solid fa-house"></i> Home</a>
                <a href="/peserta/departemen" class="menu-item"><i class="fa-solid fa-hotel"></i> Department</a>
                <a href="/peserta/pendaftaran" class="menu-item active"><i class="fa-solid fa-file-signature"></i> Register</a>
                <a href="/peserta/penilaian" class="menu-item"><i class="fa-solid fa-star-half-stroke"></i> Penilaian</a>
                <a href="/peserta/profile" class="menu-item"><i class="fa-solid fa-user-gear"></i> Profile</a>
                <a href="#" onclick="logoutConfirm()" class="menu-item btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </div>
    </header>

    <section class="banner-home" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('{{ asset('images/kasul.jpg') }}');">
        <div class="banner-home-content">
            <h1>Trainee Registration</h1>
            <p>Lengkapi formulir di bawah ini dengan data yang valid untuk memulai program magang Anda</p>
        </div>
    </section>

    <main class="main-container">
        <div class="form-registration-container">
            
            <div class="form-header-text">
                <h2>Formulir Pendaftaran Magang</h2>
                <p>Isilah seluruh informasi berikut dengan benar dan teliti.</p>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="registration-grid">
        
        <div class="column-photo">
            <label class="input-label-main">Foto Formal</label>
            <p class="photo-instruction">* Foto 3x4 menggunakan baju rapi, setengah badan.</p>
            
            <div class="photo-preview-box">
                <img src="{{ asset('images/default-avatar.png') }}" alt="Preview Foto" id="photoPreview">
                <div class="photo-overlay-icon"><i class="fa-solid fa-camera"></i></div>
            </div>

            <div class="photo-action-buttons">
                <label for="foto" class="btn-action-photo btn-upload-file">
                    <i class="fa-solid fa-image"></i> Pilih Foto
                </label>
                <input type="file" name="foto" id="foto" style="display: none;" onchange="previewImage(this)">
                
                <button type="button" class="btn-action-photo btn-delete-file" onclick="removePreview()">
                    <i class="fa-solid fa-trash-can"></i> Hapus Foto
                </button>
            </div>
        </div>

        <div class="column-fields">
            
            <div class="form-group-row">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap sesuai identitas" required>
            </div>

            <div class="form-group-row">
                <label>Nama Panggilan</label>
                <input type="text" name="nama_panggilan" placeholder="Masukkan nama panggilan Anda" required>
            </div>
                        <div class="form-group-row">
                            <label>Departemen Tujuan</label>
                            <div class="select-wrapper">
                                <select name="departemen" required>
                                    <option value="" disabled selected>-- Pilih Departemen Magang --</option>
                                    <option value="Front Office">Front Office</option>
                                    <option value="Housekeeping">Housekeeping</option>
                                    <option value="Food & Beverage Product">Food & Beverage Product</option>
                                    <option value="Food & Beverage Service">Food & Beverage Service</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Accounting -It">Accounting -It</option>
                                    <option value="Sales & Marketing">Sales & Marketing</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Human Resources Departement">Human Resources Departement</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group-row">
                <label>Nomor HP / WhatsApp</label>
                <input type="text" name="no_hp" placeholder="Contoh: 081234567xxx" required>
            </div>

            <div class="form-group-row">
                <label>Email Aktif</label>
                <input type="email" name="email" value="{{ $user->email ?? '' }}" placeholder="Masukkan email aktif" required>
            </div>

            <div class="form-group-row">
                <label>Asal Sekolah / Kampus</label>
                <input type="text" name="asal_sekolah" placeholder="Contoh: Universitas Gadjah Mada" required>
            </div>

            <div class="form-group-row">
                <label>Alamat Rumah (Sesuai KTP)</label>
                <textarea name="alamat_rumah" rows="2" placeholder="Tuliskan alamat lengkap rumah Anda..." required></textarea>
            </div>

            <div class="form-group-row">
                <label>Tempat Tinggal Sekarang (Domisili)</label>
                <textarea name="tempat_tinggal" rows="2" placeholder="Tuliskan alamat domisili saat ini..." required></textarea>
            </div>

            <div class="document-upload-section">
                <h4 class="section-sub-title"><i class="fa-solid fa-folder-open"></i> Berkas Pendukung</h4>
                
                <div class="file-input-wrapper">
                    <label><i class="fa-solid fa-file-pdf"></i> Upload CV (Curriculum Vitae)</label>
                    <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
                    <small class="file-hint">* Format: PDF/Word, Maksimal 2MB</small>
                </div>

                <div class="file-input-wrapper">
                    <label><i class="fa-solid fa-file-invoice"></i> Upload Surat Izin / Pengantar</label>
                    <input type="file" name="surat_izin" accept=".pdf,.doc,.docx" required>
                    <small class="file-hint">* Format: PDF/Word, Maksimal 2MB</small>
                </div>
            </div>

        </div>

    </div>

    <div class="form-submit-area">
        <button type="submit" class="btn-submit-registration">
            <i class="fa-solid fa-paper-plane"></i> Kirim Pendaftaran Resmi
        </button>
    </div>

</form>
        </div>
    </main>

    <script>
    function logoutConfirm() {
        let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");
        if(konfirmasi){ window.location.href = "/peserta/dashboard"; }
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('photoPreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removePreview() {
        document.getElementById('photoPreview').src = "{{ asset('images/default-avatar.png') }}";
        document.getElementById('foto_formal').value = "";
    }
    </script>

</body>
</html>