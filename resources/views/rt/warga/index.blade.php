<!DOCTYPE html>
<html>
<head><title>Data Warga RT</title></head>
<body>
    <h1>Data Warga {{ $rt->nama_rt }}</h1>
    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    <form method="GET" action="{{ route('rt.warga.index') }}">
        <input type="text" name="search" placeholder="Cari nama / NIK..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
        <a href="{{ route('rt.warga.index') }}">Reset</a>
    </form>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th><th>NIK</th><th>Nama Lengkap</th><th>JK</th><th>No HP</th><th>Alamat</th>
        </tr>
        @forelse ($warga as $i => $w)
            <tr>
                <td>{{ $warga->firstItem() + $i }}</td>
                <td>{{ $w->nik }}</td>
                <td>{{ $w->nama_lengkap }}</td>
                <td>{{ $w->jenis_kelamin }}</td>
                <td>{{ $w->no_hp ?? '-' }}</td>
                <td>{{ $w->alamat ?? '-' }}</td>
            </tr>
        @empty
            <tr><td colspan="6">Tidak ada data warga.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $warga->links() }}
</body>
</html>