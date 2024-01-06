<!-- resources/views/anggota/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Perpustakaan</title>
</head>

<body>
        @include('Navbar')

    <h1>Data Anggota Perpustakaan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $item)
                <tr>
                    <td>{{ $item->id_anggota }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>
                        <form onsubmit="return confirm('Yakin ingin hapus?');"
                            action="{{ route('anggota.destroy', $item->id_anggota) }}" method="POST">
                            {{-- ... tombol Ubah ... --}}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Hapus</button>
                            <a href="{{ route('anggota.edit', $item->id_anggota) }}" class="btn btn-warning">Ubah</a>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
