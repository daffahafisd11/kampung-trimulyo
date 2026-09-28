<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title>
</head>
<body>
    <h1>Ganti Password</h1>
    <p>Halo, <b>{{ Auth::user()->name }}</b> ({{ Auth::user()->role }})</p>

    <p>
        <a href="{{ url()->previous() }}">← Kembali</a> |
        <a href="{{ route('login') }}">Login</a>
    </p>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div style="color:green">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
        <div style="color:red">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('profile.change-password.update') }}">
        @csrf

        <p>
            <label>Password Lama</label><br>
            <input type="password" name="current_password" required>
        </p>

        <p>
            <label>Password Baru (min 6 karakter)</label><br>
            <input type="password" name="new_password" required>
        </p>

        <p>
            <label>Konfirmasi Password Baru</label><br>
            <input type="password" name="new_password_confirmation" required>
        </p>

        <button type="submit">Simpan</button>
    </form>

    <hr>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>