<!DOCTYPE html>
<html>
<head><title>Reset Password RT</title></head>
<body>
    <h1>Reset Password: {{ $user->name }}</h1>
    <p><a href="{{ route('rw.akun-rt.index') }}">← Kembali</a></p>

    @if ($errors->any())
        <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div>
    @endif

    <form method="POST" action="{{ route('rw.akun-rt.reset-password.update', $user->id) }}">
        @csrf

        <p>
            <label>Password Baru</label><br>
            <input type="password" name="password" required>
        </p>

        <p>
            <label>Konfirmasi Password</label><br>
            <input type="password" name="password_confirmation" required>
        </p>

        <button>Reset Password</button>
    </form>
</body>
</html>