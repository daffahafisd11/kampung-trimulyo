<!DOCTYPE html>
<html>
<head><title>Tambah Kategori UMKM</title></head>
<body>
    <h1>Tambah Kategori UMKM</h1>
    <p><a href="{{ route('rw.kategori-umkm.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.kategori-umkm.store') }}">
        @csrf
        <p>
            <label>Nama Kategori</label><br>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
        </p>
        <button>Simpan</button>
    </form>
</body>
</html>