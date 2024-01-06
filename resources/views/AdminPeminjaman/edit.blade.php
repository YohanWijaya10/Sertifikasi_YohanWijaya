<!-- resources/views/peminjaman/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peminjaman</title>
</head>
<body>
    <h1>Edit Data Peminjaman</h1>
    <form action="{{ route('peminjaman.update', ['id' => $peminjaman->id_peminjaman]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="id_koleksi">Koleksi:</label>
        <select name="id_koleksi" required>
            @foreach($koleksi as $item)
                <option value="{{ $item->id_koleksi }}" {{ $item->id_koleksi == $peminjaman->id_koleksi ? 'selected' : '' }}>
                    {{ $item->judul }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="id_anggota">Anggota:</label>
        <select name="id_anggota" required>
            @foreach($anggota as $item)
                <option value="{{ $item->id_anggota }}" {{ $item->id_anggota == $peminjaman->id_anggota ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
        <br>

        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" required>
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    
</body>
</html>
