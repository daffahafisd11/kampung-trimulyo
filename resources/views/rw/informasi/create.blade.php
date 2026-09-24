<!DOCTYPE html>
<html>
<head><title>Tambah Informasi</title></head>
<body>
    <h1>Tambah Informasi</h1>
    <p><a href="{{ route('rw.informasi.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('rw.informasi.store') }}">
        @csrf
        <p><label>Judul</label><br><input type="text" name="judul" value="{{ old('judul') }}" required></p>
        <p><label>Isi</label><br><textarea name="isi" rows="6" required>{{ old('isi') }}</textarea></p>
        <p><label>Tanggal</label><br><input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required></p>
        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="dipublikasikan" {{ old('status') == 'dipublikasikan' ? 'selected' : '' }}>Dipublikasikan</option>
            </select>
        </p>
        <button>Simpan</button>
    </form>
</body>
</html>