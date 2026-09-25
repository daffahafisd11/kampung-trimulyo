<!DOCTYPE html>
<html>
<head><title>Tambah Kegiatan</title></head>
<body>
    <h1>Tambah Kegiatan</h1>
    <p><a href="{{ route('rw.kegiatan.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('rw.kegiatan.store') }}">
        @csrf
        <p><label>Nama Kegiatan</label><br><input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required></p>
        <p><label>Tanggal</label><br><input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required></p>
        <p><label>Waktu Mulai</label><br><input type="time" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required></p>
        <p><label>Waktu Selesai</label><br><input type="time" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required></p>
        <p><label>Lokasi</label><br><input type="text" name="lokasi" value="{{ old('lokasi') }}" required></p>
        <p><label>Deskripsi</label><br><textarea name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea></p>
        <p>
            <label>Status</label><br>
            <select name="status" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </p>
        <button>Simpan</button>
    </form>
</body>
</html>