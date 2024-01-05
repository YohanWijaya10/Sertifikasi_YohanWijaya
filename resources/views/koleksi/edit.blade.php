<!-- resources/views/koleksi/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Koleksi</title>
</head>
<body>
    <h1>Edit Data Koleksi</h1>
    <form action="{{ route('koleksi.update', ['id' => $koleksi->id_koleksi]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="{{ $koleksi->judul }}" required>
        <br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" value="{{ $koleksi->pengarang }}">
        <br>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" value="{{ $koleksi->tahun_terbit }}">
        <br>

        <label for="jumlah_kopi">Jumlah Kopi:</label>
        <input type="text" name="jumlah_kopi" value="{{ $koleksi->jumlah_kopi }}">
        <br>

        <label for="file">Gambar:</label>
        <input type="file" name="file" id="file" class="form-control"
        style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Email"
        required>
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
