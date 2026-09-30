<!DOCTYPE html>
<html>
<head><title>Akun RT</title></head>
<body>
    <h1>Akun RT</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th><th>Nama</th><th>Email</th><th>RT</th><th>Aksi</th>
        </tr>
        @forelse ($akunRt as $i => $akun)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $akun->name }}</td>
                <td>{{ $akun->email }}</td>
                <td>{{ $akun->rt->nama_rt ?? '-' }}</td>
                <td>
                    <a href="{{ route('rw.akun-rt.edit', $akun->id) }}">Edit</a> |
                    <a href="{{ route('rw.akun-rt.reset-password', $akun->id) }}">Reset Password</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada akun RT.</td></tr>
        @endforelse
    </table>
</body>
</html>