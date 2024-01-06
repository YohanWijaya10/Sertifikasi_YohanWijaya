<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Data Peminjaman</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/" >List Pinjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Katalog" >Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showAdminPopup()">Im Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function showAdminPopup() {
        $('#adminPasswordModal').modal('show');
    }

    function checkAdminPassword() {
        var password = $('#adminPassword').val();

        if (password === '1234') {
           
            window.location.href = '/anggota';
        } else {
            alert('Incorrect password. Please try again.');
        }

        $('#adminPasswordModal').modal('hide');
    }
</script>