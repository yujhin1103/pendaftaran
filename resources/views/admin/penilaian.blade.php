<div class="penilaian-wrapper">

```
<h1 class="penilaian-title">
    Penilaian Peserta Magang
</h1>

<div class="penilaian-card">

    @if($penilaian && $penilaian->dokumen_penilaian)

        <div class="penilaian-success">

            <h3>
                Dokumen Penilaian Tersedia
            </h3>

            <span class="status-badge">
                ✓ Sudah Diverifikasi
            </span>

            <p>
                Dokumen penilaian magang Anda telah selesai diproses dan dapat dilihat maupun diunduh.
            </p>

            <div class="penilaian-btn-group">

                <a
                    href="{{ asset('storage/' . $penilaian->dokumen_penilaian) }}"
                    target="_blank"
                    class="penilaian-btn btn-lihat">

                    Lihat PDF

                </a>

                <a
                    href="{{ asset('storage/' . $penilaian->dokumen_penilaian) }}"
                    download
                    class="penilaian-btn btn-download">

                    Download PDF

                </a>

            </div>

        </div>

    @else

        <div class="penilaian-empty">

            <h3>
                Dokumen Belum Tersedia
            </h3>

            <p>
                Dokumen penilaian magang Anda masih dalam proses dan belum diunggah oleh admin.
            </p>

        </div>

    @endif

</div>
```

</div>
