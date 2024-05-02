<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Http\Requests\StoreAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data tahun pelajaran';
        $tapels = AcademicYear::all();

        return view('pages.admin.data-tahun-pelajaran.index', compact('title', 'tapels'));
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun_pelajaran' => 'required|min:9|max:9',
            'semester' => 'required',
        ]);

        $tapel = new AcademicYear([
            'tahun_pelajaran' => $request->tahun_pelajaran,
            'semester' => $request->semester,
        ]);

        $tapel->save($validateData);

        // Setting agar siswa tidak memiliki kelas
        Student::query()->update(['id_class' => null]);

        return redirect('/admin/data-tahun-pelajaran');
    }
}
