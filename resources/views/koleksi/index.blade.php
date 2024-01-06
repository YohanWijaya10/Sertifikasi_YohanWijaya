<!-- resources/views/koleksi/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Perpustakaan</title>
</head>
<body>
    @include('Navbar')

    <h1>Data Koleksi Perpustakaan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Kopi</th>
                <th>gambar</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($koleksi as $item)
                {{-- @if ($item->jumlah_kopi > 0) --}}
                    <tr>
                        <td>{{ $item->id_koleksi }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td>{{ $item->jumlah_kopi }}</td>
                        <td><img src="{{ URL::to('/') }}/assets/{{ $item->gambar }}" class="img-fluid" alt="Food Image"></td>
                        <td>
                            <form onsubmit="return confirm('Yakin ingin hapus?');"
                                action="{{ route('koleksi.destroy', $item->id_koleksi) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                <a href="{{ route('koleksi.edit', $item->id_koleksi) }}" class="btn btn-warning">Ubah</a>
                            </form>
                        </td>
                    </tr>
                {{-- @endif --}}
            @endforeach
        </tbody>
    </table>
</body>
</html>
