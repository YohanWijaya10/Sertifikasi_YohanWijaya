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
        <label for="id_koleksi" class="form-label">Nama Koleksi</label>
        <select name="id_koleksi" id="id_koleksi" class="form-select">
            <option value="" selected disabled>Pilih Koleksi</option>
            @foreach ($koleksi as $item)
                @if ($item->jumlah_kopi > 0)
                    <option value="{{ $item->id_koleksi }}">{{ $item->judul }}</option>
                @endif
            @endforeach
        </select>
        <br>
        <label for="id_anggota" class="form-label">Nama Peminjam</label>
        <select name="id_anggota" id="id_anggota" class="form-select">
            <option value="" selected disabled>Pilih Anggota</option>
            @foreach ($anggota as $item)
                <option value="{{ $item->id_anggota }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <br>
        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required onchange="calculateReturnDate()">
        <br>
        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" readonly required>
        <br>
        <button type="submit">Simpan</button>
        
        <script>
            function calculateReturnDate() {
                // Get the selected borrowing date
                const borrowingDate = new Date(document.getElementById('tanggal_pinjam').value);
                
                // Calculate the return date as 7 days from the borrowing date
                const returnDate = new Date(borrowingDate);
                returnDate.setDate(returnDate.getDate() + 7);
                
                // Format the return date as "YYYY-MM-DD"
                const formattedReturnDate = returnDate.toISOString().split('T')[0];
                
                // Set the value of the return date input
                document.getElementById('tanggal_kembali').value = formattedReturnDate;
            }
        </script>
    </form>
</body>
</html>
