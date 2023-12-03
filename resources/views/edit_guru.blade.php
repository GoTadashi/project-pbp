<!-- resources/views/edit_guru.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
</head>
<body>
    <h1>Edit Guru</h1>

    <form method="POST" action="{{ route('guru.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $guru[0]->id_guru }}"><br><br>

        NIP: <input type="text" name="nip" value="{{ $guru[0]->nip }}"><br><br>
        Nama: <input type="text" name="nama" value="{{ $guru[0]->nama }}"><br><br>
        Tempat Lahir: <input type="text" name="tempat_lahir" value="{{ $guru[0]->tempat_lahir }}"><br><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" value="{{ $guru[0]->tanggal_lahir }}"><br><br>
        Jenis Kelamin: <input type="text" name="jenis_kelamin" value="{{ $guru[0]->jenis_kelamin }}"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
