<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjaman</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data Peminjaman</h1>
        <form action="{{ route('peminjaman.update', ['id' => $peminjaman->id_peminjaman]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_koleksi">Koleksi:</label>
                <select class="form-control" name="id_koleksi" required>
                    @foreach($koleksi as $item)
                        <option value="{{ $item->id_koleksi }}" {{ $item->id_koleksi == $peminjaman->id_koleksi ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_anggota">Anggota:</label>
                <select class="form-control" name="id_anggota" required>
                    @foreach($anggota as $item)
                        <option value="{{ $item->id_anggota }}" {{ $item->id_anggota == $peminjaman->id_anggota ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" class="form-control" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
