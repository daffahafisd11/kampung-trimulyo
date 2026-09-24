<!DOCTYPE html>
<html>
<head><title>Data RT</title></head>
<body>
    <h1>Data RT</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('rw.rt.create') }}">+ Tambah RT</a></p>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th><th>RW</th><th>Nama RT</th><th>Aksi</th>
        </tr>
        @foreach ($rt as $i => $r)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $r->rw->nama_rw ?? '-' }}</td>
                <td>{{ $r->nama_rt }}</td>
                <td>
                    <a href="{{ route('rw.rt.edit', $r->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.rt.destroy', $r->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>