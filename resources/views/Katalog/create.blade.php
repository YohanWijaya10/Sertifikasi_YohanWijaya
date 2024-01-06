<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Koleksi</title>
</head>
<body>

    <h1>Tambah Data Koleksi</h1>
    <form action="{{ route('koleksi.store') }}" method="post" enctype="multipart/form-data">
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
        <input type="file" name="file" id="file" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Email"
                                required>
                        <small class="text-danger" id="IMageError" style="display:none;">image tidak boleh kosong.</small>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
