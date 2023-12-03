<!-- resources/views/edit_siswa.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>
<body>
    <h1>Edit Siswa</h1>

    <form action="{{ route('siswa.update') }}" method="post">
        @csrf
        <input type="hidden" name="nis" value="{{ $siswa[0]->nis }}">
        
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $siswa[0]->nama }}" required><br>
        
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" value="{{ $siswa[0]->tempat_lahir }}" required><br>
        
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="{{ $siswa[0]->tanggal_lahir }}" required><br>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="{{ $siswa[0]->jenis_kelamin }}" required><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
