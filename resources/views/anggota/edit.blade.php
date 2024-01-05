<!-- resources/views/anggota/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota</title>
</head>
<body>
    <h1>Edit Data Anggota</h1>
    <form action="{{ route('anggota.update', ['id' => $anggota->id_anggota]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $anggota->nama }}" required>
        <br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="{{ $anggota->alamat }}">
        <br>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" value="{{ $anggota->nomor_telepon }}">
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    
    
</body>
</html>
