<!DOCTYPE html>
<html>
<head>
    <title>Transkrip Akademik - {{ $mahasiswa->npm }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 11px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #1b4d36;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            color: #1b4d36;
            font-size: 20px;
        }
        .student-info {
            width: 100%;
            margin-bottom: 20px;
        }
        .student-info td {
            padding: 3px 0;
        }
        .semester-block {
            margin-bottom: 20px;
        }
        .semester-title {
            background-color: #f4f4f4;
            padding: 5px;
            font-weight: bold;
            border-left: 4px solid #1b4d36;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        table th {
            background-color: #f9f9f9;
            font-size: 10px;
            text-transform: uppercase;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .summary-box {
            float: right;
            width: 30%;
            border: 1px solid #1b4d36;
            padding: 10px;
            background-color: #f0fdf4;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>TRANSKRIP NILAI AKADEMIK</h1>
        <p>Politeknik Negeri / Institusi SIAKAD-WBI</p>
    </div>

    <table class="student-info">
        <tr>
            <td width="15%">Nama</td>
            <td width="35%">: <strong>{{ $mahasiswa->nama }}</strong></td>
            <td width="15%">Prodi</td>
            <td width="35%">: {{ $mahasiswa->prodi->nama_prodi }}</td>
        </tr>
        <tr>
            <td>NPM</td>
            <td>: {{ $mahasiswa->npm }}</td>
            <td>Dosen Wali</td>
            <td>: {{ $mahasiswa->dosenWali->nama ?? '-' }}</td>
        </tr>
    </table>

    @foreach($khsHistory as $khs)
    <div class="semester-block">
        <div class="semester-title">
            {{ $khs->semesterAjaran->tahun_ajaran }} - {{ ucfirst($khs->semesterAjaran->semester) }}
        </div>
        <table>
            <thead>
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th width="15%">Kode</th>
                    <th width="50%">Mata Kuliah</th>
                    <th width="10%" class="text-center">SKS</th>
                    <th width="10%" class="text-center">Nilai</th>
                    <th width="10%" class="text-center">Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach($khs->details as $index => $detail)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $detail->matakuliah->kode_mk }}</td>
                    <td>{{ $detail->matakuliah->nama_mk }}</td>
                    <td class="text-center">{{ $detail->sks }}</td>
                    <td class="text-center">{{ $detail->nilai_huruf }}</td>
                    <td class="text-center">{{ number_format($detail->bobot, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: #f9f9f9;">
                    <td colspan="3" class="text-right"><strong>IPS: {{ number_format($khs->ip, 2) }} | IPK: {{ number_format($khs->ipk, 2) }}</strong></td>
                    <td class="text-center"><strong>{{ $khs->total_sks }}</strong></td>
                    <td colspan="2" class="text-center"><strong>Total Bobot: {{ number_format($khs->total_bobot, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    @endforeach

    <div class="clearfix" style="margin-top: 30px;">
        <div class="summary-box">
            <p style="margin: 0; font-size: 14px; font-weight: bold; color: #1b4d36;">Ringkasan:</p>
            <p style="margin: 5px 0;">Total SKS: {{ $khsHistory->sum('total_sks') }}</p>
            <p style="margin: 5px 0;">IPK Akhir: {{ number_format($khsHistory->last()->ipk ?? 0, 2) }}</p>
        </div>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ $date }}</p>
        <br><br><br>
        <p>( __________________________ )</p>
        <p>Bagian Akademik</p>
    </div>
</body>
</html>
