<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: rgba(37, 190, 228, 0.548);
            --success: #10b981;
            --text: #374151;
            --text-light: #6b7280;
            --white: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                      0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--primary-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 500px;
            padding: 40px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            color: var(--text);
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-header p {
            color: var(--text-light);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text);
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: var(--radius);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn-submit {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            border-radius: var(--radius);
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
            padding: 12px 16px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            border-left: 4px solid var(--success);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Tambah Data Siswa</h1>
            <p>Isi formulir di bawah untuk menambahkan data siswa baru</p>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
    <div style="background:#fee;color:#c00;padding:10px;margin-bottom:16px;border-radius:6px;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


        <form action="{{ route('siswa.massAssignment') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="number" id="phone" name="phone" placeholder="08xxxx" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Siswa</label>
                <input type="email" id="email" name="email" placeholder="nama@gmail.com" required>
            </div>

            <!-- Kelas -->
            <div class="form-group">
                <label for="kelas">Kelas (Enum)</label>
                <select name="kelas" id="kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    <option value="RPL">RPL</option>
                    <option value="TKJ">TKJ</option>
                    <option value="MP">MP</option>
                    <option value="AK">AK</option>
                    <option value="BD">BD</option>
                    <option value="Logistik">Logistik</option>
                    <option value="PH">PH</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>


            <!-- Gender -->
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" required>
                    <option value="">-- Pilih Gender --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Rahasia">Rahasia</option>
                </select>
            </div>

            <!-- NISN -->
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="number" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
            </div>

            <!-- Major ID -->
            <div class="form-group">
                <label for="major_id">Major ID</label>
                <input type="number" id="major_id" name="major_id" placeholder="Ex: 1" required>
            </div>

            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>
    </div>
</body>
</html>
