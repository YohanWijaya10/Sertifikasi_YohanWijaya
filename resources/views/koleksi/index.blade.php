<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Perpustakaan</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @include('Navbar')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Data Koleksi Perpustakaan</h1>
            <a href="{{ route('koleksi.create') }}" class="btn btn-primary">Tambah Koleksi</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Kopi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($koleksi as $item)
                    <tr>
                        <td>{{ $item->id_koleksi }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->tahun_terbit }}</td>
                        <td>{{ $item->jumlah_kopi }}</td>
                        <td><img src="{{ URL::to('/') }}/assets/{{ $item->gambar }}" class="img-fluid"
                                alt="Koleksi Image"></td>
                        <td>
                            <form onsubmit="return confirm('Yakin ingin hapus?');"
                                action="{{ route('koleksi.destroy', $item->id_koleksi) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('koleksi.edit', $item->id_koleksi) }}"
                                    class="btn btn-warning btn-sm">Ubah</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan script dan link JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
