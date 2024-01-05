<!-- resources/views/koleksi/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Perpustakaan</title>
</head>
<body>
    <h1>Data Koleksi Perpustakaan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Kopi</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
