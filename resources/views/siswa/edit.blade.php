<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>

    <style>
        /* Style tetap memakai style kamu sebelumnya agar tetap modern */
        :root {
            --primary: #2563eb;
            --primary-light: rgba(37, 190, 228, 0.548);
            --warning: #f59e0b;
            --success: #10b981;
            --text: #374151;
            --text-light: #6b7280;
            --white: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius: 8px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI'; }
        body { background-color: var(--primary-light); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }

        .form-container {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 500px;
            padding: 40px;
        }

        .form-header { text-align: center; margin-bottom: 30px; position: relative; }
        .edit-badge {
            position: absolute; top: -10px; right: -10px;
            background-color: var(--warning); color: white;
            padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;
        }

        input, select {
            width: 100%; padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: var(--radius);
            font-size: 16px;
            margin-bottom: 20px;
        }
        input:focus, select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .btn-container { display: flex; gap: 12px; }
        .btn-submit {
            background-color: var(--primary); color: white;
            border: none; padding: 12px; border-radius: var(--radius);
            cursor: pointer; flex: 1; font-size: 16px;
        }
        .btn-cancel {
            background-color: #f3f4f6; color: var(--text);
            border: 1px solid #d1d5db;
            padding: 12px; border-radius: var(--radius);
            text-align: center; flex: 1; text-decoration: none;
        }
        .alert-success { background-color: rgba(16, 185, 129, 0.1); color: var(--success); padding: 12px 16px; border-radius: var(--radius); margin-bottom: 20px; border-left: 4px solid var(--success); font-size: 14px; }
    </style>
</head>

<body>
    <div class="form-container">

        <div class="form-header">
            <h1>Edit Data Siswa</h1>
            <p>Perbarui informasi siswa di bawah ini</p>
            <div class="edit-badge">EDIT</div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
    <div style="
        background-color: rgba(239, 68, 68, 0.1);
        padding: 12px 16px;
        border-radius: 8px;
        border-left: 4px solid #ef4444;
        color: #b91c1c;
        margin-bottom: 20px;
        font-size: 14px;
    ">
        <strong>Terjadi kesalahan:</strong>
        <ul style="margin-top: 8px; padding-left: 20px; list-style: disc;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('siswa.massUpdate', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $student->nama }}" required>

            <label>Nomor Telepon</label>
            <input type="text" name="phone" value="{{ $student->phone }}" required>

            <label>Email</label>
            <input type="text" name="email" value="{{ $student->email }}" required>

            <label>Kelas</label>
            <select name="kelas" required>
                <option value="RPL" {{ $student->kelas == 'RPL' ? 'selected' : '' }}>RPL</option>
                <option value="TKJ" {{ $student->kelas == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                <option value="MP" {{ $student->kelas == 'MP' ? 'selected' : '' }}>MP</option>
                <option value="AK" {{ $student->kelas == 'AK' ? 'selected' : '' }}>AK</option>
                <option value="BD" {{ $student->kelas == 'BD' ? 'selected' : '' }}>BD</option>
                <option value="Logistik" {{ $student->kelas == 'Logistik' ? 'selected' : '' }}>Logistik</option>
                <option value="PH" {{ $student->kelas == 'PH' ? 'selected' : '' }}>PH</option>
                <option value="DKV" {{ $student->kelas == 'DKV' ? 'selected' : '' }}>DKV</option>
                <option value="Pariwisata" {{ $student->kelas == 'Pariwisata' ? 'selected' : '' }}>Pariwisata</option>
            </select>

            <label>Gender</label>
            <select name="gender" required>
                <option value="Laki-laki" {{ $student->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $student->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="Rahasia" {{ $student->gender == 'Rahasia' ? 'selected' : '' }}>Rahasia</option>
            </select>

            <label>NISN</label>
            <input type="text" name="nisn" value="{{ $student->nisn }}" required>

            <label>Major ID</label>
            <input type="text" name="major_id" value="{{ $student->major_id }}" required>

            <div class="btn-container">
                <button type="submit" class="btn-submit">Perbarui Data</button>
                <a href="javascript:history.back()" class="btn-cancel">Batal</a>
            </div>

        </form>
    </div>
</body>
</html>
