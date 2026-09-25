<!DOCTYPE html>
<html>
<head><title>Kas {{ $rt->nama_rt }}</title></head>
<body>
    <h1>Kas {{ $rt->nama_rt }}</h1>
    <p>Halo, {{ Auth::user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    <h2>Ringkasan</h2>
    <table border="1" cellpadding="8">
        <tr>
            <td>Total Masuk</td>
            <td>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Total Keluar</td>
            <td>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><b>Saldo Akhir</b></td>
            <td><b>Rp {{ number_format($saldo, 0, ',', '.') }}</b></td>
        </tr>
    </table>

    <h2>Riwayat Transaksi</h2>
    <p><i>Catatan: RT hanya bisa melihat, tidak bisa mengubah.</i></p>

    <table border="1" cellpadding="8">
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Dicatat Oleh</th>
        </tr>
        @forelse ($transaksi as $t)
            <tr>
                <td>{{ $t->tanggal->format('d/m/Y') }}</td>
                <td>{{ $t->jenis }}</td>
                <td>{{ $t->kategori }}</td>
                <td>{{ $t->keterangan }}</td>
                <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                <td>{{ $t->user->name ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada transaksi.</td>
            </tr>
        @endforelse
    </table>

    <br>
    {{ $transaksi->links() }}
</body>
</html>