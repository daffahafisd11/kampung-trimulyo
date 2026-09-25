<!DOCTYPE html>
<html>
<head><title>Kas RT Saya</title></head>
<body>
    <h1>Kas RT Saya</h1>
    <p><a href="{{ route('warga.dashboard') }}">&larr; Dashboard</a></p>

    <table border="1" cellpadding="8">
        <tr><td>Total Masuk</td><td>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</td></tr>
        <tr><td>Total Keluar</td><td>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</td></tr>
        <tr><td><b>Saldo Akhir</b></td><td><b>Rp {{ number_format($saldo, 0, ',', '.') }}</b></td></tr>
    </table>

    <h2>Riwayat Transaksi</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Tanggal</th><th>Jenis</th><th>Kategori</th><th>Keterangan</th><th>Jumlah</th><th>Dicatat Oleh</th>
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
            <tr><td colspan="6">Belum ada transaksi.</td></tr>
        @endforelse
    </table>

    {{ $transaksi->links() }}
</body>
</html>