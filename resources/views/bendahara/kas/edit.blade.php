<!DOCTYPE html>
<html>
<head><title>Edit Transaksi</title></head>
<body>
    <h1>Edit Transaksi</h1>
    <p><a href="{{ route('bendahara.kas.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('bendahara.kas.update', $kas->id) }}">
        @csrf @method('PUT')

        <p><label>Tanggal</label><br>
            <input type="date" name="tanggal" value="{{ old('tanggal', $kas->tanggal->format('Y-m-d')) }}" required></p>

        <p><label>Jenis</label><br>
            <select name="jenis" required>
                <option value="masuk" {{ old('jenis', $kas->jenis) == 'masuk' ? 'selected' : '' }}>Uang Masuk</option>
                <option value="keluar" {{ old('jenis', $kas->jenis) == 'keluar' ? 'selected' : '' }}>Uang Keluar</option>
            </select></p>

        <p><label>Kategori</label><br>
            <input type="text" name="kategori" value="{{ old('kategori', $kas->kategori) }}" required></p>

        <p><label>Keterangan</label><br>
            <textarea name="keterangan" required>{{ old('keterangan', $kas->keterangan) }}</textarea></p>

        <p><label>Jumlah (Rp)</label><br>
            <input type="number" name="jumlah" value="{{ old('jumlah', $kas->jumlah) }}" min="1" step="any" required></p>

        <button>Update</button>
    </form>
</body>
</html>