<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peminjaman</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Data Peminjaman</h1>
        <form action="{{ route('peminjaman.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_koleksi">Nama Koleksi</label>
                <select name="id_koleksi" id="id_koleksi" class="form-control">
                    <option value="" selected disabled>Pilih Koleksi</option>
                    @foreach ($koleksi as $item)
                        @if ($item->jumlah_kopi > 0)
                            <option value="{{ $item->id_koleksi }}">{{ $item->judul }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_anggota">Nama Peminjam</label>
                <select name="id_anggota" id="id_anggota" class="form-control">
                    <option value="" selected disabled>Pilih Anggota</option>
                    @foreach ($anggota as $item)
                        <option value="{{ $item->id_anggota }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required
                    onchange="calculateReturnDate()">
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" readonly required>
            </div>
            <div class="form-group">
                <label for="status_pengembalian">Status Pengembalian:</label>
                <select name="status_pengembalian" id="status_pengembalian" class="form-control" required>
                    <option value="0" selected hidden>Belum Kembali</option>
                    <option value="1" selected hidden>Sudah Kembali</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function calculateReturnDate() {
            const borrowingDate = new Date(document.getElementById('tanggal_pinjam').value);

            const returnDate = new Date(borrowingDate);
            returnDate.setDate(returnDate.getDate() + 7);

            const formattedReturnDate = returnDate.toISOString().split('T')[0];

            document.getElementById('tanggal_kembali').value = formattedReturnDate;
        }
    </script>
</body>

</html>
