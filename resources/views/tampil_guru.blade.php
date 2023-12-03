<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Guru</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Data Guru</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Guru</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <!-- Add more columns if needed -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gurus as $guru)
                    <tr>
                        <td>{{ $guru->id_guru }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>{{ $guru->nama }}</td>
                        <!-- Add more columns if needed -->
                        <td>
                            <a href="{{ route('guru.edit', $guru->id_guru) }}" class="btn btn-primary">Edit</a>
                            
                            <form action="{{ route('guru.delete') }}" method="post" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $guru->id_guru }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this guru?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/add-guru') }}" class="btn btn-success">Tambah Guru Baru</a>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
