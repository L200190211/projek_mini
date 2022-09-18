<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\kelas;
use App\Models\makul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    // View
    public function data_kelas()
    {
        $data = DB::table('kelas')
            ->join('dosen', 'dosen.id_dosen', '=', 'kelas.id_dosen')
            ->join('makul', 'makul.id_makul', '=', 'kelas.id_makul')
            ->get();

        return view('admin.kelas.index', compact('data'));
    }

    // Add
    public function add_kelas()
    {
        $pilih_makul = makul::all();
        $pilih_dosen = dosen::all();
        return view('admin.kelas.create', compact('pilih_dosen', 'pilih_makul'));
    }
    public function add_data_kelas(Request $request)
    {
        $validatedData = $request->validate([
            'id_makul' => 'required',
            'id_dosen' => 'required',
            'kode_kelas' => 'required',
        ]);
        kelas::create($request->all());
        return redirect()->route('data_kelas')->with('success', 'Data Berhasil Ditambah');
    }

    // Edit
    public function edit_kelas($id_kelas)
    {
        $data = kelas::find($id_kelas);
        $pilih_makul = makul::all();
        $pilih_dosen = dosen::all();

        return view('admin.kelas.edit', compact('data', 'pilih_makul', 'pilih_dosen'));
    }

    public function edit_data_kelas(Request $request, $id_kelas)
    {
        $data = kelas::find($id_kelas);
        $data->id_makul = $request['id_makul'];
        $data->id_dosen = $request['id_dosen'];
        $data->kode_kelas = $request['kode_kelas'];
        $data->save();

        return redirect()->route('data_kelas');
    }

    // Delete 
    public function delete_kelas($id_kelas)
    {
        $data = kelas::find($id_kelas);

        $data->delete();
        return redirect()->route('data_kelas');
    }
}
