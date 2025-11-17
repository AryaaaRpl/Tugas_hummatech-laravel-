<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
{
    $students = Student::all();

    return view('siswa.indexStudent', compact('students'));
}
    // Tampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

      // Simpan data siswa baru (Mass Assignment)
  public function massAssignment(Request $request)
{
    $validated = $request->validate([
        'nama'       => 'required|string|min:6|max:255',
        'phone' => 'required|numeric|unique:students,phone',
        'email'      => 'required|email|unique:students,email',
        'kelas'      => 'required|in:RPL,TKJ,MP,AK,BD,Logistik,PH,DKV,Pariwisata',
        'gender'     => 'required|in:Laki-laki,Perempuan,Rahasia',
        'nisn'  => 'required|numeric|unique:students,nisn',
        'major_id'   => 'required|numeric',

    ]);
    // dd($validated);
    Student::create($validated);

    return redirect()->route('siswa.index');


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
            'phone'      => 'required|numeric|unique:students,phone,' . $id,
            'email'      => 'required|email|unique:students,email,' . $id,
            'kelas'      => 'required|in:RPL,TKJ,MP,AK,BD,Logistik,PH,DKV,Pariwisata',
            'gender'     => 'required|in:Laki-laki,Perempuan,Rahasia',
            'nisn'       => 'required|numeric|unique:students,nisn,' . $id,
            'major_id'   => 'required|numeric',

        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama minimal 5 karakter',
            'kelas.required' => 'Kelas wajib diisi',
            'gender.required' => 'gender wajib ada kalo gaada ga manusia',
            'phone.required' => 'nomor wajib diisi',
            'email.required' => 'email wajib diisi',
            'nisn.required' => 'nisn wajib diisi',
        ]);

        // Cari data lama dan update
        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()->route('siswa.index');
    }


    public function destroy(string $id) {
       $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('siswa.index');
    }

    public function deleteByMajor($major_name) {
        Student::where('id')->delete();
        return redirect()->back()->with('success', 'Data dengan major tersebut berhasil dihapus!');
    }
}

