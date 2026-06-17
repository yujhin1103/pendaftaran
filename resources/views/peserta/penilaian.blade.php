<div class="peserta-content">

    <h1 class="peserta-title">
        Hasil Penilaian Magang
    </h1>

    @if($penilaian)

        <div class="peserta-card">

            <p>
                <strong>Total Nilai :</strong>
                {{ $penilaian->total_score }}
            </p>

            <p>
                <strong>Rating :</strong>
                {{ $penilaian->rating }}
            </p>

            <p>
                <strong>Tanggal Penilaian :</strong>
                {{ $penilaian->tanggal_ttd ? date('d-m-Y', strtotime($penilaian->tanggal_ttd)) : '-' }}
            </p>

            @if($penilaian->dokumen_penilaian)

                <div style="margin-top:20px;">

                    <a
                        href="/admin/penilaian/{{ $penilaian->id }}/download"
                        class="btn-nilai">

                        Unduh Hasil Penilaian

                    </a>

                </div>

            @else

                <p style="color:#E67E22; font-weight:bold;">
                    Dokumen penilaian belum tersedia.
                </p>

            @endif

        </div>

    @else

        <div class="peserta-card">

            <p>
                Penilaian belum tersedia.
            </p>

        </div>

    @endif

</div>