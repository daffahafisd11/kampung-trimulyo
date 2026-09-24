<!DOCTYPE html>
<html>
<head><title>Data Warga</title></head>
<body>
    <h1>Data Warga</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <p><a href="{{ route('rw.warga.create') }}">+ Tambah Warga</a></p>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th><th>NIK</th><th>Nama</th><th>Email</th><th>JK</th><th>RT</th><th>Aksi</th>
        </tr>
        @foreach ($warga as $i => $w)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $w->nik }}</td>
                <td>{{ $w->nama_lengkap }}</td>
                <td>{{ $w->user->email }}</td>
                <td>{{ $w->jenis_kelamin }}</td>
                <td>{{ $w->rt->nama_rt ?? '-' }}</td>
                <td>
                    <a href="{{ route('rw.warga.edit', $w->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.warga.destroy', $w->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>