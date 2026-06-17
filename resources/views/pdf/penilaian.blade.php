<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Form Penilaian Peserta Magang</title>
<style>
   body{
    font-family: DejaVu Sans, sans-serif;
    font-size: 10px;
    margin: 12px;
    color: #000;
}

h1{
    text-align:center;
    font-size:16px;
    margin-bottom:10px;
}

.info-table{
    width:100%;
    margin-bottom:10px;
}

.info-table td{
    padding:2px;
}

.section-title{
    background:#8B5A2B;
    color:#fff;
    text-align:center;
    font-weight:bold;
    padding:4px;
    margin-top:8px;
}

.penilaian-table{
    width:100%;
    border-collapse:collapse;
    margin-top:3px;
}

.penilaian-table th,
.penilaian-table td{
    border:1px solid #000;
    padding:3px;
}

.penilaian-table th{
    background:#f0f0f0;
}

.hasil-section{
    margin-top:10px;
}

.hasil-section p{
    margin:3px 0;
}

.signature-section{
    margin-top:15px;
}

.signature-location{
    text-align:right;
    margin-bottom:10px;
}

.signature-table{
    width:100%;
}

.signature-table td{
    width:50%;
    text-align:center;
    vertical-align:top;
}

.signature-image{
    height:50px;
    margin:5px 0;
}

.signature-image img{
    max-height:50px;
    max-width:90px;
}
</style>
</head>
<body>
<h1>FORM PENILAIAN PESERTA MAGANG</h1>

<div class="info-box">

    <table class="info-table">

        <tr>
            <td width="20%"><strong>Nama</strong></td>
            <td width="2%">:</td>
            <td>{{ $penilaian->pendaftaran->nama_lengkap }}</td>
        </tr>

        <tr>
            <td><strong>Asal Sekolah</strong></td>
            <td>:</td>
            <td>{{ $penilaian->pendaftaran->asal_sekolah }}</td>
        </tr>

        <tr>
            <td><strong>Departemen</strong></td>
            <td>:</td>
            <td>{{ $penilaian->pendaftaran->departemen }}</td>
        </tr>

        <tr>
            <td><strong>Periode Magang</strong></td>
            <td>:</td>
            <td>
                {{ date('d-m-Y', strtotime($penilaian->pendaftaran->tanggal_mulai)) }}
                s/d
                {{ date('d-m-Y', strtotime($penilaian->pendaftaran->tanggal_selesai)) }}
            </td>
        </tr>

    </table>

</div>

<div class="section-title">
    ATTITUDE
</div>

<table class="penilaian-table">

    <tr>
        <th width="10%">No</th>
        <th>Kriteria</th>
        <th width="15%">Nilai</th>
    </tr>

    <tr>
        <td align="center">1</td>
        <td>Grooming & Hospitality</td>
        <td align="center">{{ $penilaian->grooming }}</td>
    </tr>

    <tr>
        <td align="center">2</td>
        <td>Motivation</td>
        <td align="center">{{ $penilaian->motivation }}</td>
    </tr>

    <tr>
        <td align="center">3</td>
        <td>Responsibility</td>
        <td align="center">{{ $penilaian->responsibility }}</td>
    </tr>

    <tr>
        <td align="center">4</td>
        <td>Cooperativeness</td>
        <td align="center">{{ $penilaian->cooperativeness }}</td>
    </tr>

    <tr>
        <td align="center">5</td>
        <td>Attendance</td>
        <td align="center">{{ $penilaian->attendance }}</td>
    </tr>

</table>

<div class="section-title">
    KNOWLEDGE & SKILL
</div>

<table class="penilaian-table">

    <tr>
        <th width="10%">No</th>
        <th>Kriteria</th>
        <th width="15%">Nilai</th>
    </tr>

    <tr>
        <td align="center">6</td>
        <td>Job Knowledge</td>
        <td align="center">{{ $penilaian->job_knowledge }}</td>
    </tr>

    <tr>
        <td align="center">7</td>
        <td>Quality of Work</td>
        <td align="center">{{ $penilaian->quality_of_work }}</td>
    </tr>

    <tr>
        <td align="center">8</td>
        <td>Job Speed</td>
        <td align="center">{{ $penilaian->job_speed }}</td>
    </tr>

    <tr>
        <td align="center">9</td>
        <td>Initiative</td>
        <td align="center">{{ $penilaian->initiative }}</td>
    </tr>

    <tr>
        <td align="center">10</td>
        <td>Improvement Achieved</td>
        <td align="center">{{ $penilaian->improvement_achieved }}</td>
    </tr>

</table>

<div class="hasil-box">

    <h3>HASIL PENILAIAN</h3>

    <p>
        <strong>Total Score :</strong>
        {{ $penilaian->total_score }}
    </p>

    <p>
        <strong>Rating :</strong>
        {{ strtoupper($penilaian->rating) }}
    </p>

    <table class="rating-table">

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

<div class="signature-section">

    <div class="signature-location">
        {{ $penilaian->tempat }},
        {{ date('d-m-Y', strtotime($penilaian->tanggal_ttd)) }}
    </div>

    <table class="signature-table">

        <tr>

            <td>
                <strong>Manager / Pimpinan</strong>

                <div class="signature-image">
                    @if($penilaian->tanda_tangan_manager)
                        <img src="{{ public_path('storage/' . $penilaian->tanda_tangan_manager) }}">
                    @endif
                </div>

                <div class="signature-name">
                    {{ $penilaian->nama_penanda_tangan_manager }}
                </div>

                <div>
                    {{ $penilaian->jabatan_manager }}
                </div>
            </td>

            <td>
                <strong>HRD</strong>

                <div class="signature-image">
                    @if($penilaian->tanda_tangan_hrd)
                        <img src="{{ public_path('storage/' . $penilaian->tanda_tangan_hrd) }}">
                    @endif
                </div>

                <div class="signature-name">
                    {{ $penilaian->nama_penanda_tangan_hrd }}
                </div>

                <div>
                    {{ $penilaian->jabatan_hrd }}
                </div>
            </td>

        </tr>

    </table>

</div>
</body>
</html>
