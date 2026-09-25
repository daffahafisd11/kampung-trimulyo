<!DOCTYPE html>
<html>
<head><title>Kas RT</title></head>
<body>
    <h1>Kas RT {{ Auth::user()->rt->nama_rt ?? '-' }}</h1>
    <p>Halo, {{ Auth::user()->name }} (Bendahara)</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <h2>Ringkasan</h2>
    <table border="1" cellpadding="8">
        <tr><td>Total Masuk</td><td>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td></tr>
        <tr><td>Total Keluar</td><td>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td></tr>
        <tr><td><b>Saldo Akhir</b></td><td><b>Rp {{ number_format($saldo, 0, ',', '.') }}</b></td></tr>
    </table>

    <h2>Riwayat Transaksi</h2>
    <p><a href="{{ route('bendahara.kas.create') }}">+ Catat Transaksi</a></p>

    <table border="1" cellpadding="8">
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        @foreach ($transaksi as $t)
            <tr>
                <td>{{ $t->tanggal->format('d/m/Y') }}</td>
                <td>{{ $t->jenis }}</td>
                <td>{{ $t->kategori }}</td>
                <td>{{ $t->keterangan }}</td>
                <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('bendahara.kas.edit', $t->id) }}">Edit</a>
                    <form method="POST" action="{{ route('bendahara.kas.destroy', $t->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $transaksi->links() }}
</body>
</html>