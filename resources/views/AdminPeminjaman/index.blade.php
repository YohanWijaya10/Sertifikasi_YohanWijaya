<!-- resources/views/peminjaman/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Perpustakaan</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    @include('Navbar')

    

    <div class="container mt-4">
        <h1>Data Peminjaman Perpustakaan</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Koleksi</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->koleksi ? $item->koleksi->judul : 'Judul Tidak Ditemukan' }}</td>
                        <td>{{ $item->anggota ? $item->anggota->nama : 'Anggota Tidak Ditemukan' }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   
</body>
</html>
