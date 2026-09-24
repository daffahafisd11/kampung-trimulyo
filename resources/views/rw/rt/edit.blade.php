<!DOCTYPE html>
<html>
<head><title>Edit RT</title></head>
<body>
    <h1>Edit RT</h1>
    <p><a href="{{ route('rw.rt.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('rw.rt.update', $rt->id) }}">
        @csrf @method('PUT')
        <p>
            <label>RW</label><br>
            <select name="rw_id" required>
                @foreach ($rw as $r)
                    <option value="{{ $r->id }}" {{ old('rw_id', $rt->rw_id) == $r->id ? 'selected' : '' }}>
                        {{ $r->nama_rw }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>Nama RT</label><br>
            <input type="text" name="nama_rt" value="{{ old('nama_rt', $rt->nama_rt) }}" required>
        </p>
        <button>Update</button>
    </form>
</body>
</html>