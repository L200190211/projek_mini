<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    // View
    public function data_dosen()
    {
        $data = DB::table('dosen')->paginate(10);
        return view('admin.dosen.index', compact('data'));
    }

    // Add
    public function add_dosen()
    {
        return view('admin.dosen.create');
    }
    public function add_data_dosen(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => ['required', 'unique:dosen', 'max:10'],
            'nama_dosen' => 'required',
        ]);
        dosen::create($request->all());
        return redirect()->route('data_dosen')->with('success', 'Data Berhasil Ditambah');
    }

    // Edit
    public function edit_dosen($id_dosen)
    {
        $data = dosen::find($id_dosen);

        return view('admin.dosen.edit', compact('data'));
    }

    public function edit_data_dosen(Request $request, $id_dosen)
    {
        $data = dosen::find($id_dosen);
        $data->nip = $request['nip'];
        $data->nama_dosen = $request['nama_dosen'];
        $data->save();

        return redirect()->route('data_dosen');
    }

    // Delete 
    public function delete_dosen($id_dosen)
    {
        $data = dosen::find($id_dosen);

        $data->delete();
        return redirect()->route('data_dosen');
    }
}
