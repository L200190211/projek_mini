<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use App\Models\makul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakulController extends Controller
{
    // View
    public function data_makul()
    {
        $data = DB::table('makul')->paginate(10);
        return view('admin.makul.index', compact('data'));
    }

    // Add
    public function add_makul()
    {
        $datadosen = dosen::all();
        return view('admin.makul.create', compact('datadosen'));
    }
    public function add_data_makul(Request $request)
    {
        $validatedData = $request->validate([
            'kode_makul' => ['required', 'unique:makul', 'max:10'],
            'nama_makul' => 'required',
            'sks_makul' => 'required',
            'semester' => 'required',
        ]);
        makul::create($request->all());
        return redirect()->route('data_makul')->with('success', 'Data Berhasil Ditambah');
    }

    // Edit
    public function edit_makul($id_makul)
    {
        $data = makul::find($id_makul);

        return view('admin.makul.edit', compact('data'));
    }

    public function edit_data_makul(Request $request, $id_makul)
    {
        $data = makul::find($id_makul);
        $data->kode_makul = $request['kode_makul'];
        $data->nama_makul = $request['nama_makul'];
        $data->sks_makul = $request['sks_makul'];
        $data->semester = $request['semester'];
        $data->save();

        return redirect()->route('data_makul');
    }

    // Delete 
    public function delete_makul($id_makul)
    {
        $data = makul::find($id_makul);

        $data->delete();
        return redirect()->route('data_makul');
    }
}
