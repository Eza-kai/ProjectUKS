<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h2 { text-align: center; }
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
</body>
</html>
