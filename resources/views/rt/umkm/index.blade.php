<!DOCTYPE html>
<html>
<head><title>UMKM RT</title></head>
<body>
    <h1>UMKM di RT Saya</h1>
    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama Usaha</th><th>Warga</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @foreach ($umkm as $i => $u)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->warga->nama_lengkap }}</td>
                <td>{{ $u->kategori->nama_kategori }}</td>
                <td>{{ $u->status }}</td>
                <td>
                    @if ($u->status === 'menunggu_verifikasi')
                        <form method="POST" action="{{ route('rt.umkm.updateStatus', $u->id) }}" style="display:inline">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="disetujui">
                            <button>Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('rt.umkm.updateStatus', $u->id) }}" style="display:inline">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="ditolak">
                            <button>Tolak</button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>