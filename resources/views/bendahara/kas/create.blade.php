<!DOCTYPE html>
<html>
<head><title>Catat Transaksi</title></head>
<body>
    <h1>Catat Transaksi Kas</h1>
    <p><a href="{{ route('bendahara.kas.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('bendahara.kas.store') }}">
        @csrf

        <p><label>Tanggal</label><br>
            <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required></p>

        <p><label>Jenis</label><br>
            <select name="jenis" required>
                <option value="masuk" {{ old('jenis') == 'masuk' ? 'selected' : '' }}>Uang Masuk</option>
                <option value="keluar" {{ old('jenis') == 'keluar' ? 'selected' : '' }}>Uang Keluar</option>
            </select></p>

        <p><label>Kategori</label><br>
            <input type="text" name="kategori" value="{{ old('kategori') }}"
                    placeholder="Iuran Warga / Donasi / Belanja" required></p>

        <p><label>Keterangan</label><br>
            <textarea name="keterangan" required>{{ old('keterangan') }}</textarea></p>

        <p><label>Jumlah (Rp)</label><br>
            <input type="number" name="jumlah" value="{{ old('jumlah') }}" min="1" step="any" required></p>

        <button>Simpan</button>
    </form>
</body>
</html>