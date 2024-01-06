<!-- resources/views/peminjaman/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Perpustakaan</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Peminjaman</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showAdminPopup()">Im Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Data Peminjaman Perpustakaan</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Koleksi</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->koleksi ? $item->koleksi->judul : 'Judul Tidak Ditemukan' }}</td>
                        <td>{{ $item->anggota ? $item->anggota->nama : 'Anggota Tidak Ditemukan' }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Admin Password Popup Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="adminPasswordModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="adminPassword">Enter Password:</label>
                    <input type="password" class="form-control" id="adminPassword">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="checkAdminPassword()">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function showAdminPopup() {
            $('#adminPasswordModal').modal('show');
        }

        function checkAdminPassword() {
            var password = $('#adminPassword').val();

            // For simplicity, using hardcoded password '1234'
            if (password === '1234') {
                // Redirect to admin view or perform other actions
                // You can add window.location.href = '/admin' or any other redirection logic here
                window.location.href = '/anggota';
            } else {
                alert('Incorrect password. Please try again.');
            }

            // Close the modal
            $('#adminPasswordModal').modal('hide');
        }
    </script>
</body>
</html>
