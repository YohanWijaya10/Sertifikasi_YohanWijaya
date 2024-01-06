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

   
@include('NavbarDefault')
    <div class="container mt-4">
        <h1>Data Peminjaman Perpustakaan</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Koleksi</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->koleksi ? $item->koleksi->judul : 'Judul Tidak Ditemukan' }}</td>
                        <td>{{ $item->anggota ? $item->anggota->nama : 'Anggota Tidak Ditemukan' }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                        <td>
                            @if ($item->status_pengembalian == 0)
                                Belum Dikembalikan
                            @else
                             Sudah Dikembalikan
                            @endif
                            </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Admin Password Popup Modal -->
    
</body>
</html>
