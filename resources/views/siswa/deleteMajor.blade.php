<html>
    <body>
        <a href="/subject/form">Tambah</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Subject Name</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($major as $m)

                <tr>
                    <td>{{ $loop->iteration }}</td>
  <td>{{ $m->major_name }}</td>
                    <td>

    <form action="{{ route('major.delete', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <span>Data Not Found</span>
                @endforelse
            </tbody>
        </table>
    </body>
</html>
