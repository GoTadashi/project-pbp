<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Matapelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container"><br>
        <h1>Data Matapelajaran</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Matapelajaran</th>
                    <th>ID Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matapelajarans as $matapelajaran)
                    <tr>
                        <td>{{ $matapelajaran->id_matapelajaran }}</td>
                        <td>{{ $matapelajaran->nama_matapelajaran }}</td>
                        <td>{{ $matapelajaran->id_guru }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/edit-matapelajaran/'.$matapelajaran->id_matapelajaran) }}">Edit</a>
                            <form action="{{ url('/hapus-matapelajaran') }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id_matapelajaran" value="{{ $matapelajaran->id_matapelajaran }}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" href="{{ url('/tambah-matapelajaran') }}">Tambah Matapelajaran</a>
    </div>
</body>
</html>
