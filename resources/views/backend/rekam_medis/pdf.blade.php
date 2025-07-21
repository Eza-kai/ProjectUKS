<h4>Laporan Rekam Medis</h4>
<p>Dari:{{ request('tanggal_awal') }}
{{ request('tanggal_akhir') }}</p>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Keluhan</th>
            <th>Tindakan</th>
            <th>Obat</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($rekam as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->siswa->user->name }}</td>
                <td>{{ $data->siswa->kelas->nama_kelas}}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->keluhan }}</td>
                <td>{{ $data->tindakan }}</td>
                <td>{{ $data->obat->nama_obat }}</td>
                <td>{{ $data->status }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" align="center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>