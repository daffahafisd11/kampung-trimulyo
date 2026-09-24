<!DOCTYPE html>
<html>
<head><title>Edit Warga</title></head>
<body>
    <h1>Edit Warga</h1>
    <p><a href="{{ route('rw.warga.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.warga.update', $warga->id) }}">
        @csrf @method('PUT')

        <h3>Akun Login</h3>
        <p><label>Nama</label><br><input type="text" name="name" value="{{ old('name', $warga->user->name) }}" required></p>
        <p><label>Email</label><br><input type="email" name="email" value="{{ old('email', $warga->user->email) }}" required></p>

        <h3>Data Kependudukan</h3>
        <p><label>NIK</label><br><input type="text" name="nik" value="{{ old('nik', $warga->nik) }}" maxlength="16" required></p>
        <p><label>Nama Lengkap</label><br><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required></p>
        <p>
            <label>Jenis Kelamin</label><br>
            <select name="jenis_kelamin" required>
                <option value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </p>
        <p><label>Tanggal Lahir</label><br><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir?->format('Y-m-d')) }}" required></p>
        <p>
            <label>RT</label><br>
            <select name="rt_id" required>
                @foreach ($rt as $r)
                    <option value="{{ $r->id }}" {{ old('rt_id', $warga->rt_id) == $r->id ? 'selected' : '' }}>{{ $r->nama_rt }}</option>
                @endforeach
            </select>
        </p>
        <p><label>No HP</label><br><input type="text" name="no_hp" value="{{ old('no_hp', $warga->no_hp) }}"></p>
        <p><label>Alamat</label><br><textarea name="alamat">{{ old('alamat', $warga->alamat) }}</textarea></p>

        <button>Update</button>
    </form>
</body>
</html>