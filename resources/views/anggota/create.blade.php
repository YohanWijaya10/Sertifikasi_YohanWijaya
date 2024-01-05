<!-- resources/views/anggota/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Anggota</title>
</head>
<body>
    <h1>Tambah Data Anggota</h1>
    <form action="{{ route('anggota.store') }}" method="post">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat">
        <br>
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
