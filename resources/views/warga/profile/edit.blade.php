<!DOCTYPE html>
<html>
<head><title>Profil Saya</title></head>
<body>
    <h1>Profil Saya</h1>
    <p><a href="{{ route('warga.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('warga.profile.update') }}">
        @csrf @method('PUT')
        <p><label>Nama (Akun)</label><br><input type="text" name="name" value="{{ old('name', $warga->user->name) }}" required></p>
        <p><label>Nama Lengkap</label><br><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required></p>
        <p>
            <label>Jenis Kelamin</label><br>
            <select name="jenis_kelamin" required>
                <option value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </p>
        <p><label>Tanggal Lahir</label><br><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir?->format('Y-m-d')) }}" required></p>
        <p><label>No HP</label><br><input type="text" name="no_hp" value="{{ old('no_hp', $warga->no_hp) }}"></p>
        <p><label>Alamat</label><br><textarea name="alamat">{{ old('alamat', $warga->alamat) }}</textarea></p>
        <button>Update Profil</button>
    </form>

    <p>NIK: {{ $warga->nik }} (tidak bisa diubah)</p>
</body>
</html>