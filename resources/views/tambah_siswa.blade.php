<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>
<body>
    <h1>Tambah Siswa</h1>

    <form action="{{ route('siswa.add') }}" method="post">
        @csrf
        <label for="nis">NIS:</label>
        <input type="text" name="nis" required><br>

        <label for="nis">NISN:</label>
        <input type="text" name="nisn" required><br>
        
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" required><br>
        
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
