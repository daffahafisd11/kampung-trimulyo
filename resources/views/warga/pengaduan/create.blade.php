<!DOCTYPE html>
<html>
<head><title>Buat Pengaduan</title></head>
<body>
    <h1>Buat Pengaduan</h1>
    <p><a href="{{ route('warga.pengaduan.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach
        </div>
    @endif

    {{-- enctype="multipart/form-data" WAJIB untuk upload file --}}
    <form method="POST" action="{{ route('warga.pengaduan.store') }}" enctype="multipart/form-data">
        @csrf

        <p>
            <label>Kategori</label><br>
            <select name="kategori_id" required>
                <option value="">-- Pilih --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Judul</label><br>
            <input type="text" name="judul" value="{{ old('judul') }}" required>
        </p>

        <p>
            <label>Lokasi</label><br>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" required>
        </p>

        <p>
            <label>Deskripsi</label><br>
            <textarea name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
        </p>

        <p>
            <label>Foto (opsional, max 2MB, JPG/PNG)</label><br>
            <input type="file" name="foto" accept="image/*">
        </p>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>