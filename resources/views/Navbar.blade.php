<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        {{-- <a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a> --}}
                        <a class="nav-link {{ $active_anggota ?? '' }}" href="{{ route('anggota.index') }}">Anggota</a>

                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('koleksi.index') }}">Koleksi</a> --}}
                        <a class="nav-link {{ $active_koleksi ?? '' }}" href="{{ route('koleksi.index') }}">Koleksi</a>

                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('koleksi.index') }}">Koleksi</a> --}}
                        <a class="nav-link {{ $active_peminjaman ?? '' }}" href="{{ route('peminjamanAdmin.index') }}">Peminjaman</a>

                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
