<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function create()
    {
        return view('siswa.create');
    }

    public function massAssignment(Request $request)
    {
        // validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);
          DB::table('students')->insert([
            'nama' => $validated['nama'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan'],
        ]);

        

        // simpan data ke database menggunakan Mass Assignment
        Student::create($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil disimpan!');
    }


}
