<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Matapelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container"><br>
        <h1>Tambah Matapelajaran</h1>
        <form action="{{ url('/tambah_matapelajaran') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama_matapelajaran">Nama Matapelajaran:</label>
                <input type="text" name="nama_matapelajaran" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_guru">ID Guru:</label>
                <input type="text" name="id_guru" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2 flex">Simpan</button>
            <a type="button" href="{{ url('/tampilan-matapelajaran')}}" class="btn btn-warning mt-2">Kembali</a>
        </form>
    </div>
</body>
</html>
