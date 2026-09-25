<!DOCTYPE html>
<html>
<head><title>Daftar UMKM</title></head>
<body>
    <h1>Daftar UMKM</h1>
    <p><a href="{{ route('warga.umkm.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('warga.umkm.store') }}">
        @csrf
        <p><label>Nama Usaha</label><br><input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" required></p>
        <p>
            <label>Kategori</label><br>
            <select name="kategori_id" required>
                <option value="">-- Pilih --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </p>
        <p><label>Deskripsi</label><br><textarea name="deskripsi" required>{{ old('deskripsi') }}</textarea></p>
        <p><label>Alamat</label><br><textarea name="alamat" required>{{ old('alamat') }}</textarea></p>
        <p><label>WhatsApp</label><br><input type="text" name="whatsapp" value="{{ old('whatsapp') }}" required></p>
        <button>Daftar</button>
    </form>
</body>
</html>