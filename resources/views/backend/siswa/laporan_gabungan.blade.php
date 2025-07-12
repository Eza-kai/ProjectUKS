<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Gabungan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h2 { text-align: center; margin-top: 30px; }
    </style>
</head>
<body>

    <h2>Data Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
            <tr>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Rekam Medis</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Tindakan</th>
                <th>Obat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekam as $r)
            <tr>
                <td>{{ $r->siswa->user->name ?? '-' }}</td>
                <td>{{ $r->tanggal }}</td>
                <td>{{ $r->keluhan }}</td>
                <td>{{ $r->tindakan }}</td>
                <td>{{ $r->obat->nama_obat ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Riwayat Kunjungan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $rw)
            <tr>
                <td>{{ $rw->siswa->user->name ?? '-' }}</td>
                <td>{{ $rw->tanggal }}</td>
                <td>{{ $rw->keluhan }}</td>
                <td>{{ $rw->tindakan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Data Obat</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $ob)
            <tr>
                <td>{{ $ob->nama_obat }}</td>
                <td>{{ $ob->kategori }}</td>
                <td>{{ $ob->stok }}</td>
                <td>{{ $ob->tanggal_kadaluarsa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
