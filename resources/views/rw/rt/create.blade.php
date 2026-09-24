<!DOCTYPE html>
<html>
<head><title>Tambah RT</title></head>
<body>
    <h1>Tambah RT</h1>
    <p><a href="{{ route('rw.rt.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('rw.rt.store') }}">
        @csrf
        <p>
            <label>RW</label><br>
            <select name="rw_id" required>
                <option value="">-- Pilih RW --</option>
                @foreach ($rw as $r)
                    <option value="{{ $r->id }}" {{ old('rw_id') == $r->id ? 'selected' : '' }}>
                        {{ $r->nama_rw }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>Nama RT</label><br>
            <input type="text" name="nama_rt" value="{{ old('nama_rt') }}" required>
        </p>
        <button>Simpan</button>
    </form>
</body>
</html>