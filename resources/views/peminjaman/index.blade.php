<!-- resources/views/peminjaman/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Perpustakaan</title>
</head>
<body>
    <h1>Data Peminjaman Perpustakaan</h1>
    <table border="1">
        <thead>
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
                    <td>{{ $item->koleksi->judul }}</td>
                    <td>{{ $item->anggota->nama }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
