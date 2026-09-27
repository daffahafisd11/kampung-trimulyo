<!DOCTYPE html>
<html>
<head><title>Edit Informasi</title></head>
<body>
    <h1>Edit Informasi</h1>
    <p><a href="{{ route('rt.informasi.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rt.informasi.update', $informasi->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <p>
            <label>Judul</label><br>
            <input type="text" name="judul" value="{{ old('judul', $informasi->judul) }}" required>
        </p>

        <p>
            <label>Isi</label><br>
            <textarea name="isi" rows="6" required>{{ old('isi', $informasi->isi) }}</textarea>
        </p>

        <p>
            <label>Tanggal</label><br>
            <input type="date" name="tanggal" value="{{ old('tanggal', $informasi->tanggal?->format('Y-m-d')) }}" required>
        </p>

        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="draft" {{ old('status', $informasi->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="dipublikasikan" {{ old('status', $informasi->status) == 'dipublikasikan' ? 'selected' : '' }}>Dipublikasikan</option>
            </select>
        </p>

        @if ($informasi->gambar)
            <p>
                <label>Gambar Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $informasi->gambar) }}" width="200">
            </p>
        @endif

        <p>
            <label>Ganti Gambar (opsional)</label><br>
            <input type="file" name="gambar" accept="image/*">
        </p>

        <button type="submit">Update</button>
    </form>
</body>
</html>