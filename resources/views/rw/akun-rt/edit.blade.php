<!DOCTYPE html>
<html>
<head><title>Edit Akun RT</title></head>
<body>
    <h1>Edit Akun RT: {{ $user->name }}</h1>
    <p><a href="{{ route('rw.akun-rt.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.akun-rt.update', $user->id) }}">
        @csrf @method('PUT')

        <p>
            <label>Nama</label><br>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </p>

        <p>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </p>

        <p>
            <label>RT</label><br>
            <select name="rt_id" required>
                @foreach ($rt as $r)
                    <option value="{{ $r->id }}" {{ old('rt_id', $user->rt_id) == $r->id ? 'selected' : '' }}>
                        {{ $r->nama_rt }}
                    </option>
                @endforeach
            </select>
        </p>

        <button>Simpan</button>
    </form>
</body>
</html>