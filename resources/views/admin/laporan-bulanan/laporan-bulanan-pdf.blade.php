<!DOCTYPE html>
<html>

<head>
    <title>Laporan Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Laporan Bulanan</h1>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Total Barang Masuk</th>
                <th>Total Barang Keluar</th>
                <th>Tanggal Dibuat</th>
                <th>Dibuat Oleh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanBulanan as $laporan)
                <tr>
                    <td>{{ $laporan->bulan }}</td>
                    <td>{{ $laporan->tahun }}</td>
                    <td>{{ $laporan->total_barang_masuk }}</td>
                    <td>{{ $laporan->total_barang_keluar }}</td>
                    <td>{{ $laporan->tanggal_dibuat }}</td>
                    <td>{{ $laporan->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
