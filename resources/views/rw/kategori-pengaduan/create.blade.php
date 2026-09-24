<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Tambah Kategori Pengaduan</title></head>
<body>
    <h1>Tambah Kategori Pengaduan</h1>
    <p><a href="{{ route('rw.kategori-pengaduan.index') }}">&larr; Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.kategori-pengaduan.store') }}">
        @csrf
        <p><label>Nama Kategori</label><br><input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required></p>
        <p><label>Deskripsi</label><br><textarea name="deskripsi">{{ old('deskripsi') }}</textarea></p>
        <button>Simpan</button>
    </form>
</body>
</html>