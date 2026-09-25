<!DOCTYPE html>
<html>
<head><title>Edit UMKM</title></head>
<body>
    <h1>Edit UMKM</h1>
    <p><a href="{{ route('warga.umkm.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('warga.umkm.update', $umkm->id) }}">
        @csrf @method('PUT')
        <p><label>Nama Usaha</label><br><input type="text" name="nama_usaha" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required></p>
        <p>
            <label>Kategori</label><br>
            <select name="kategori_id" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ old('kategori_id', $umkm->kategori_id) == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </p>
        <p><label>Deskripsi</label><br><textarea name="deskripsi" required>{{ old('deskripsi', $umkm->deskripsi) }}</textarea></p>
        <p><label>Alamat</label><br><textarea name="alamat" required>{{ old('alamat', $umkm->alamat) }}</textarea></p>
        <p><label>WhatsApp</label><br><input type="text" name="whatsapp" value="{{ old('whatsapp', $umkm->whatsapp) }}" required></p>
        <button>Update</button>
    </form>
</body>
</html>