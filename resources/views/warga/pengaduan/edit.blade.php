<!DOCTYPE html>
<html>
<head><title>Edit Pengaduan</title></head>
<body>
    <h1>Edit Pengaduan</h1>
    <p><a href="{{ route('warga.pengaduan.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach
        </div>
    @endif

    {{-- enctype="multipart/form-data" WAJIB untuk upload file --}}
    <form method="POST" action="{{ route('warga.pengaduan.update', $pengaduan->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <p>
            <label>Kategori</label><br>
            <select name="kategori_id" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ old('kategori_id', $pengaduan->kategori_id) == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Judul</label><br>
            <input type="text" name="judul" value="{{ old('judul', $pengaduan->judul) }}" required>
        </p>

        <p>
            <label>Lokasi</label><br>
            <input type="text" name="lokasi" value="{{ old('lokasi', $pengaduan->lokasi) }}" required>
        </p>

        <p>
            <label>Deskripsi</label><br>
            <textarea name="deskripsi" rows="5" required>{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
        </p>

        {{-- Preview foto lama --}}
        @if ($pengaduan->foto)
            <p>
                <label>Foto Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $pengaduan->foto) }}" width="200" style="border:1px solid #ccc;">
            </p>
        @endif

        <p>
            <label>Ganti Foto (opsional, kosongkan kalau tidak ganti)</label><br>
            <input type="file" name="foto" accept="image/*">
        </p>

        <button type="submit">Update</button>
    </form>
</body>
</html>