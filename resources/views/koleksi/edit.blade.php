<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Koleksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data Koleksi</h1>
        <form action="{{ route('koleksi.update', ['id' => $koleksi->id_koleksi]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" name="judul" value="{{ $koleksi->judul }}" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang:</label>
                <input type="text" class="form-control" name="pengarang" value="{{ $koleksi->pengarang }}">
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="text" class="form-control" name="tahun_terbit" value="{{ $koleksi->tahun_terbit }}">
            </div>

            <div class="form-group">
                <label for="jumlah_kopi">Jumlah Kopi:</label>
                <input type="text" class="form-control" name="jumlah_kopi" value="{{ $koleksi->jumlah_kopi }}">
            </div>

            <div class="form-group">
                <label for="file">Gambar:</label>
                <input type="file" class="form-control-file" name="file" id="file" style="background-color: #F4F9FF; border-radius: 10px;" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
