<!-- resources/views/koleksi/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Koleksi</title>
</head>
<body>
    <h1>Tambah Data Koleksi</h1>
    <form action="{{ route('koleksi.store') }}" method="post">
        @csrf
        <label for="judul">Judul:</label>
        <input type="text" name="judul" required>
        <br>
        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang">
        <br>
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" name="tahun_terbit">
        <br>
        <label for="jumlah_kopi">Jumlah Kopi:</label>
        <input type="text" name="jumlah_kopi">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
