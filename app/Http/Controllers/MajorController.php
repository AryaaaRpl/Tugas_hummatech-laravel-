<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
     // Tampilkan form tambah siswa
    public function create()
    {
        return view('siswa.createMajor');
    }

      // Simpan data siswa baru (Mass Assignment)
    public function massAssignment(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'major_name' => 'required|string|min:2|max:255'
        ]);

        // Simpan data ke database menggunakan Mass Assignment
        Major::create($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil disimpan!');
    }

    // Tampilkan form edit berdasarkan ID

    public function edit($id)
    {
        $student = Major::findOrFail($id); // ambil data lama berdasarkan ID
        return view('siswa.editMajor', compact('student'));
    }


    //  Update data siswa (Mass Update)


public function delete($id)
{
    $major = Major::findOrFail($id);
    $major->delete();

    return redirect()->route('major.index')->with('success', 'Data berhasil dihapus!');
}

    public function destroy() {
        $major = Major::destroy([2, 3]);
        return $major;
    }

    public function massDelete() {
        $major = Major::where('major_name', 'BD')->delete();
        return $major;
    }

    public function index() {
        $major = Major::all();
        return view('index', compact('major'));
    }

     public function massUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'major_name' => 'required|string|min:2|max:255'
        ], [
            'major_name.min' => 'Nama jurusan minimal 2 karakter',
        ]);

        $major = Major::findOrFail($id);
        $major->update($validated);

        return redirect()->route('major.index')->with('success', 'Jurusan berhasil diperbarui!');
    }
}
