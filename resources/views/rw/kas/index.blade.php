<!DOCTYPE html>
<html>
<head><title>Kas Semua RT</title></head>
<body>
    <h1>Kas Semua RT</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    <table border="1" cellpadding="8">
        <tr>
            <th>RT</th>
            <th>Bendahara</th>
            <th>Total Masuk</th>
            <th>Total Keluar</th>
            <th>Saldo</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d['rt']->nama_rt }}</td>
                <td>{{ $d['bendahara']->name ?? '-' }}</td>
                <td>Rp {{ number_format($d['total_masuk'], 0, ',', '.') }}</td>
                <td>Rp {{ number_format($d['total_keluar'], 0, ',', '.') }}</td>
                <td>Rp {{ number_format($d['saldo'], 0, ',', '.') }}</td>
                <td><a href="{{ route('rw.kas.show', $d['rt']->id) }}">Detail</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>