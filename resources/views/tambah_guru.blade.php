<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card text-left w-50">
        <div class="card-header">
            <h1 class="card-title">Tambah Guru Baru</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.add') }}">
                @csrf

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP:</label>
                    <input type="text" class="form-control" name="nip" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                    <input type="text" class="form-control" name="tempat_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <input type="text" class="form-control" name="jenis_kelamin" required>
                </div>

                <button type="submit" class="btn btn-success">Tambah Guru</button>
                <a href="{{ url('/tampilan-guru') }}" class="btn btn-danger" role="button">Kembali</a>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
