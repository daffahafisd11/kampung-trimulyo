<!DOCTYPE html>
<html>
<head><title>Kegiatan</title></head>
<body>
    <h1>Kegiatan</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <p><a href="{{ route('rw.kegiatan.create') }}">+ Tambah Kegiatan</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama</th><th>Tanggal</th><th>Waktu</th><th>Lokasi</th><th>Status</th><th>Aksi</th></tr>
        @foreach ($kegiatan as $i => $k)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $k->nama_kegiatan }}</td>
                <td>{{ $k->tanggal?->format('d/m/Y') }}</td>
                <td>{{ $k->waktu_mulai }} - {{ $k->waktu_selesai }}</td>
                <td>{{ $k->lokasi }}</td>
                <td>{{ $k->status }}</td>
                <td>
                    <a href="{{ route('rw.kegiatan.edit', $k->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.kegiatan.destroy', $k->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>