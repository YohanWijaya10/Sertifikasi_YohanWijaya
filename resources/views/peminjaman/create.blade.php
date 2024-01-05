<!-- resources/views/peminjaman/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
</head>
<body>
    <h1>Tambah Data Peminjaman</h1>
    <form action="{{ route('peminjaman.store') }}" method="post">
        @csrf
        <label for="customer_id" class="form-label">Nama Koleksi</label>
                        <select name="id_koleksi" id="id_koleksi" class="form-select">
                            <option value="" selected disabled>Pilih Koleksi</option>
                            @foreach ($koleksi as $koleksi)
                                <option value="{{ $koleksi->id_koleksi }}">{{ $koleksi->judul }}</option>
                            @endforeach
                        </select>
        <br>
        <label for="id_anggota" class="form-label">Nama Peminjam</label>
        <select name="id_anggota" id="id_anggota" class="form-select">
            <option value="" selected disabled>Pilih Koleksi</option>
            @foreach ($anggota as $anggota)
                <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama }}</option>
            @endforeach
        </select>
        <br>
        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required>
        <br>
        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
