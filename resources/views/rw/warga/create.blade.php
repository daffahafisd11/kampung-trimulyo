<!DOCTYPE html>
<html>
<head><title>Tambah Warga</title></head>
<body>
    <h1>Tambah Warga</h1>
    <p><a href="{{ route('rw.warga.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.warga.store') }}">
        @csrf

        <h3>Akun Login</h3>
        <p><label>Nama</label><br><input type="text" name="name" value="{{ old('name') }}" required></p>
        <p><label>Email</label><br><input type="email" name="email" value="{{ old('email') }}" required></p>
        <p><label>Password</label><br><input type="password" name="password" required></p>
        <p><label>Konfirmasi Password</label><br><input type="password" name="password_confirmation" required></p>

        <h3>Data Kependudukan</h3>
        <p><label>NIK (16 digit)</label><br><input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" required></p>
        <p><label>Nama Lengkap</label><br><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required></p>
        <p>
            <label>Jenis Kelamin</label><br>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </p>
        <p><label>Tanggal Lahir</label><br><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required></p>
        <p>
            <label>RT</label><br>
            <select name="rt_id" required>
                <option value="">-- Pilih RT --</option>
                @foreach ($rt as $r)
                    <option value="{{ $r->id }}" {{ old('rt_id') == $r->id ? 'selected' : '' }}>{{ $r->nama_rt }}</option>
                @endforeach
            </select>
        </p>
        <p><label>No HP</label><br><input type="text" name="no_hp" value="{{ old('no_hp') }}"></p>
        <p><label>Alamat</label><br><textarea name="alamat">{{ old('alamat') }}</textarea></p>

        <button>Simpan</button>
    </form>
</body>
</html>