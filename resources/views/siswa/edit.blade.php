<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
</head>
<body>
    <h1>Edit Data Siswa</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('siswa.massUpdate', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $student->nama }}" required><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" value="{{ $student->kelas }}" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="{{ $student->jurusan }}" required><br><br>

        <button type="submit">Perbarui</button>
    </form>
</body>
</html>
