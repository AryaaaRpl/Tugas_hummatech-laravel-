<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <h2 class="mb-4">Daftar Siswa</h2>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
        </div>

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Gender</th>
                    <th>NISN</th>
                    <th>Major ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->kelas }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->major_id }}</td>

                        <td class="d-flex justify-content-center gap-2">

                            {{-- Tombol Edit --}}
                            <a href="{{ route('siswa.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            {{-- Tombol Delete --}}
                            <form action="{{ route('siswa.destroy', $student->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Debugging --}}
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Debugging Info
            </div>
            <div class="card-body">
                <pre>{{ json_encode($students, JSON_PRETTY_PRINT) }}</pre>
            </div>
        </div>

    </div>

</body>

</html>
