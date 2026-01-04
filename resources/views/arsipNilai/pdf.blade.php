<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Hasil Studi - {{ $mahasiswa->npm }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px double #1B5937;
            padding-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            color: #1B5937;
            font-size: 18pt;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0;
            font-size: 10pt;
            color: #666;
        }
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 14pt;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 3px 0;
            vertical-align: top;
        }
        .info-label {
            width: 150px;
            font-weight: bold;
        }
        .info-separator {
            width: 10px;
        }
        .grade-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .grade-table th {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 10pt;
            text-align: center;
        }
        .grade-table td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 10pt;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .footer {
            margin-top: 50px;
        }
        .footer-table {
            width: 100%;
        }
        .signature-box {
            width: 250px;
            text-align: center;
        }
        .summary-box {
            background-color: #f9f9f9;
            border: 1px solid #eee;
            padding: 15px;
            margin-bottom: 20px;
        }
        .summary-item {
            display: inline-block;
            margin-right: 30px;
        }
        .summary-label {
            font-size: 9pt;
            color: #777;
            text-transform: uppercase;
        }
        .summary-value {
            font-size: 16pt;
            font-weight: bold;
            color: #1B5937;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Pendidikan Wimar Bisnis Indonesia</h2>
        <p>Jalan Sahabat No. 1, Medan Estate, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara</p>
        <p>Email: info@wbi.ac.id | Website: www.wbi.ac.id</p>
    </div>

    <div class="title">KARTU HASIL STUDI (KHS)</div>

    <table class="info-table">
        <tr>
            <td class="info-label">NAMA</td>
            <td class="info-separator">:</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td class="info-label">TAHUN AJARAN</td>
            <td class="info-separator">:</td>
            <td>{{ $khs->semesterAjaran->tahun_ajaran }}</td>
        </tr>
        <tr>
            <td class="info-label">NPM</td>
            <td class="info-separator">:</td>
            <td>{{ $mahasiswa->npm }}</td>
            <td class="info-label">SEMESTER</td>
            <td class="info-separator">:</td>
            <td>{{ ucfirst($khs->semesterAjaran->semester) }}</td>
        </tr>
        <tr>
            <td class="info-label">PROGRAM STUDI</td>
            <td class="info-separator">:</td>
            <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
            <td class="info-label">TANGGAL CETAK</td>
            <td class="info-separator">:</td>
            <td>{{ $date }}</td>
        </tr>
    </table>

    <table class="grade-table">
        <thead>
            <tr>
                <th width="30">NO</th>
                <th width="100">KODE</th>
                <th>MATA KULIAH</th>
                <th width="50">SKS</th>
                <th width="50">NILAI</th>
                <th width="50">BOBOT</th>
                <th width="60">SKS x BOBOT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khs->details as $index => $detail)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $detail->matakuliah->kode_mk }}</td>
                <td>{{ $detail->matakuliah->nama_mk }}</td>
                <td class="text-center">{{ $detail->sks }}</td>
                <td class="text-center">{{ $detail->nilai_huruf }}</td>
                <td class="text-center">{{ number_format($detail->bobot, 2) }}</td>
                <td class="text-center">{{ number_format($detail->sks * $detail->bobot, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary-box">
        <div class="summary-item">
            <div class="summary-label">Total SKS</div>
            <div class="summary-value">{{ $khs->total_sks }}</div>
        </div>
        <div class="summary-item">
            <div class="summary-label">Total SKS x Bobot</div>
            <div class="summary-value">{{ number_format($khs->total_bobot, 2) }}</div>
        </div>
        <div class="summary-item">
            <div class="summary-label">IP Semester (IPS)</div>
            <div class="summary-value">{{ number_format($khs->ip, 2) }}</div>
        </div>
        <div class="summary-item">
            <div class="summary-label">IP Kumulatif (IPK)</div>
            <div class="summary-value">{{ number_format($khs->ipk, 2) }}</div>
        </div>
    </div>

    <div class="footer">
        <table class="footer-table">
            <tr>
                <td></td>
                <td class="signature-box">
                    <p>Medan, {{ $date }}</p>
                    <p>Ketua Program Studi,</p>
                    <br><br><br><br>
                    <p><strong>( __________________________ )</strong></p>
                    <p>NIDN. ..........................</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
