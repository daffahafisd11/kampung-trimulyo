<!DOCTYPE html>
<html>
<head><title>Edit Kegiatan</title></head>
<body>
    <h1>Edit Kegiatan</h1>
    <p><a href="{{ route('rt.kegiatan.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rt.kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <p><label>Nama Kegiatan</label><br><input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" required></p>

        <p><label>Tanggal</label><br><input type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal?->format('Y-m-d')) }}" required></p>

        <p><label>Waktu Mulai</label><br><input type="time" name="waktu_mulai" value="{{ old('waktu_mulai', $kegiatan->waktu_mulai) }}" required></p>

        <p><label>Waktu Selesai</label><br><input type="time" name="waktu_selesai" value="{{ old('waktu_selesai', $kegiatan->waktu_selesai) }}" required></p>

        <p><label>Lokasi</label><br><input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" required></p>

        <p><label>Deskripsi</label><br><textarea name="deskripsi" rows="4" required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea></p>

        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="aktif" {{ old('status', $kegiatan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="selesai" {{ old('status', $kegiatan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ old('status', $kegiatan->status) == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </p>

        @if ($kegiatan->gambar)
            <p>
                <label>Gambar Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" width="200">
            </p>
        @endif

        <p><label>Ganti Gambar (opsional)</label><br><input type="file" name="gambar" accept="image/*"></p>

        <button type="submit">Update</button>
    </form>
</body>
</html>