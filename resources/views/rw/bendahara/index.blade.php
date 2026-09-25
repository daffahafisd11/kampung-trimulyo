<!DOCTYPE html>
<html>
<head><title>Kelola Bendahara</title></head>
<body>
    <h1>Kelola Bendahara</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <table border="1" cellpadding="8">
        <tr><th>RT</th><th>Bendahara</th><th>Aksi</th></tr>
        @foreach ($rt as $r)
            <tr>
                <td>{{ $r->nama_rt }}</td>
                <td>{{ $r->bendahara->name ?? '-' }}</td>
                <td><a href="{{ route('rw.bendahara.edit', $r->id) }}">Tunjuk/Ubah</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>