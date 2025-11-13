<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // Tampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

      // Simpan data siswa baru (Mass Assignment)
    public function massAssignment(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'subject_name' => 'required|string|min:6|max:255',
            'major_name' => 'required|string|min:2|max:255'
        ]);

        // Simpan data ke database menggunakan Mass Assignment
        Student::create($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil disimpan!');
    }

    // Tampilkan form edit berdasarkan ID

    public function edit($id)
    {
        $student = Student::findOrFail($id); // ambil data lama berdasarkan ID
        return view('siswa.edit', compact('student'));
    }


    //  Update data siswa (Mass Update)

    public function massUpdate(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|min:5|max:255',
            'kelas' => 'required|string|min:1|max:5',
            'jurusan' => 'required|string|min:3|max:255',
            'subject_name' => 'required|string|min:6|max:255',
            'major_name' => 'required|string|min:7|max:255'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama minimal 5 karakter',
            'kelas.required' => 'Kelas wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
            'jurusan.min' => 'Jurusan minimal 3 karakter',
            'subject_name.min' => 'Subject Minimal 6 Karakter',
            'major_name.min' => 'Major Name Minimal 7 karakter'
        ]);

        // Cari data lama dan update
        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil diupdate! ', $id);
    }

    public function Delete() {
        $student = Student::find(1);
        $student->delete();
        return "success boss";
    }

    public function destroy() {
        $student = Student::destroy([2, 3]);
        return $student;
    }

    public function massDelete() {
        $student = Student::where('subject_name', 'matematika')->delete();
        return $student;
    }
}

