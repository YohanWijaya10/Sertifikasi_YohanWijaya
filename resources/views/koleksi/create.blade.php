<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Koleksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Data Koleksi</h1>
        <form action="{{ route('koleksi.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang:</label>
                <input type="text" class="form-control" name="pengarang">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="text" class="form-control" name="tahun_terbit">
            </div>
            <div class="form-group">
                <label for="jumlah_kopi">Jumlah Kopi:</label>
                <input type="text" class="form-control" name="jumlah_kopi">
            </div>
            <div class="form-group">
                <label for="file">File:</label>
                <input type="file" class="form-control-file" name="file" id="file" style="background-color: #F4F9FF; border-radius: 10px;" required>
                <small class="text-danger" id="IMageError" style="display:none;">File tidak boleh kosong.</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
