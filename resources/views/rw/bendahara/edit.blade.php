<!DOCTYPE html>
<html>
<head><title>Tunjuk Bendahara</title></head>
<body>
    <h1>Tunjuk Bendahara {{ $rt->nama_rt }}</h1>
    <p><a href="{{ route('rw.bendahara.index') }}">← Kembali</a></p>

    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <form method="POST" action="{{ route('rw.bendahara.update', $rt->id) }}">
        @csrf @method('PUT')

        <p>
            <label>Pilih Warga sebagai Bendahara</label><br>
            <select name="user_id" required>
                <option value="">-- Pilih Warga --</option>
                @foreach ($warga as $w)
                    <option value="{{ $w->id }}" {{ $rt->bendahara && $rt->bendahara->id == $w->id ? 'selected' : '' }}>
                        {{ $w->name }} ({{ $w->email }})
                    </option>
                @endforeach
            </select>
        </p>

        <button>Simpan</button>
    </form>

    <p><b>Catatan:</b> Kalau RT ini sudah punya bendahara, memilih warga baru akan mengganti bendahara lama.</p>
</body>
</html>