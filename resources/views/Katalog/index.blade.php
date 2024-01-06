<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Perpustakaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    @include('NavbarDefault')

    <div class="container mt-4">
        <h1>Data Koleksi Perpustakaan</h1>

        <div class="row">
            @foreach ($koleksi as $item)
                {{-- @if ($item->jumlah_kopi > 0) --}}
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ URL::to('/') }}/assets/{{ $item->gambar }}" class="card-img-top" alt="Food Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->pengarang }}</p>
                            <p class="card-text">{{ $item->tahun_terbit }}</p>
                            <p class="card-text">{{ $item->jumlah_kopi }}</p>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            @endforeach
        </div>
    </div>
</body>
</html>
