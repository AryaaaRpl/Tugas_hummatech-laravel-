<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
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
            position: relative;
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
        
        .edit-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: var(--warning);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
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
        
        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: var(--radius);
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .btn-container {
            display: flex;
            gap: 12px;
            margin-top: 30px;
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
            flex: 1;
            transition: background-color 0.3s ease;
        }
        
        .btn-submit:hover {
            background-color: #1d4ed8;
        }
        
        .btn-cancel {
            background-color: #f3f4f6;
            color: var(--text);
            border: 1px solid #d1d5db;
            border-radius: var(--radius);
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            flex: 1;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }
        
        .btn-cancel:hover {
            background-color: #e5e7eb;
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
        
        .student-info {
            background-color: #f8fafc;
            border-radius: var(--radius);
            padding: 16px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary);
        }
        
        .student-info p {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 4px;
        }
        
        @media (max-width: 576px) {
            .form-container {
                padding: 30px 20px;
            }
            
            .btn-container {
                flex-direction: column;
            }
        }
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

        <div class="student-info">
            <p><strong>ID Siswa:</strong> #{{ $student->id }}</p>
            <p><strong>Terakhir diperbarui:</strong> {{ $student->updated_at ?? 'Belum pernah diperbarui' }}</p>
        </div>

        <form action="{{ route('siswa.massUpdate', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ $student->nama }}" placeholder="Masukkan nama lengkap siswa" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" id="kelas" name="kelas" value="{{ $student->kelas }}" placeholder="Contoh: X, XI, XII" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" value="{{ $student->jurusan }}" placeholder="Contoh: IPA, IPS, Teknik" required>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-submit">Perbarui Data</button>
                <a href="javascript:history.back()" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>