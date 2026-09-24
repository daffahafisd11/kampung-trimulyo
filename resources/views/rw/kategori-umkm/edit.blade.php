<!DOCTYPE html>
<html>
<head><title>Edit Kategori UMKM</title></head>
<body>
    <h1>Edit Kategori UMKM</h1>
    <p><a href="{{ route('rw.kategori-umkm.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.kategori-umkm.update', $kategori->id) }}">
        @csrf @method('PUT')
        <p>
            <label>Nama Kategori</label><br>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
        </p>
        <button>Update</button>
    </form>
</body>
</html>