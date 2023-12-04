<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Matapelajaran</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container"><br>
        <h1>Edit Matapelajaran</h1>
        @foreach($matapelajaran as $matapel)
        <form action="{{ url('/edit-matapelajaran') }}" method="post">
            @csrf
            <input type="hidden" name="id_matapelajaran" value="{{ $matapel->id_matapelajaran }}">
            <div class="form-group">
                <label for="nama_matapelajaran">Nama Matapelajaran:</label>
                <input type="text" name="nama_matapelajaran" class="form-control" value="{{ $matapel->nama_matapelajaran }}" required>
            </div>
            <div class="form-group">
                <label for="id_guru">ID Guru:</label>
                <input type="text" name="id_guru" class="form-control" value="{{ $matapel->id_guru }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        @endforeach
        <a class="btn btn-default" href="{{ url('/tampilan-matapelajaran') }}">Kembali</a>
    </div>
</body>
</html>
