<?php

namespace App\Http\Controllers;

use Mahasiswas;
use App\Models\mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    // View
    public function data_mhs()
    {
        $data = DB::table('mahasiswas')->paginate(10);
        return view('admin.mahasiswa.index', compact('data'));
    }

    // Add
    public function add_mhs()
    {
        return view('admin.mahasiswa.create');
    }

    // public function add_data_mhs(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nim_mhs' => ['required', 'unique:mahasiswas', 'max:10'],
    //         'nama_mhs' => 'required',
    //         'email' => 'required',
    //         'alamat' => 'required',
    //         'no_tlp' => 'required',
    //     ]);
    //     mahasiswa::create($request->all());
    //     return redirect()->route('data_mhs')->with('success', 'Data Berhasil Ditambah');
    // }

    public function add_data_mhs(Request $request)
    {
        $data = new mahasiswa();
        $data->nim_mhs = $request['nim_mhs'];
        $data->nama_mhs = $request['nama_mhs'];
        $data->email = $request['email'];
        $data->alamat = $request['alamat'];
        $data->no_tlp = $request['no_tlp'];
        $data->save();
        $id = $data;

        $data2 = new User();
        $data2->id_mhs = $id->id_mhs;
        $data2->name = $id->nama_mhs;
        $data2->email = $id->email;
        $data2->status = '1';
        $data2->password = $id->nim_mhs;
        $data2->save();

        return redirect()->route('data_mhs')->with('success', 'Data Berhasil Ditambah');
    }

    // Edit
    public function edit_mhs($id_mhs)
    {
        $data = mahasiswa::find($id_mhs);

        return view('admin.mahasiswa.edit', compact('data'));
    }

    public function edit_data_mhs(Request $request, $id_mhs)
    {
        $data = mahasiswa::find($id_mhs);
        $data = mahasiswa::where('id_mhs', $id_mhs)->first();
        $data->nim_mhs = $request['nim_mhs'];
        $data->nama_mhs = $request['nama_mhs'];
        $data->email = $request['email'];
        $data->alamat = $request['alamat'];
        $data->no_tlp = $request['no_tlp'];
        $data->save();
        $id = $data;

        $data2 = User::find($id_mhs);
        $data2 = User::where('id_mhs', $id_mhs)->first();
        $data2->id_mhs = $id->id_mhs;
        $data2->name = $id->nama_mhs;
        $data2->email = $id->email;
        $data2->status = '1';
        $data2->password = $id->nim_mhs;
        $data2->save();

        return redirect()->route('data_mhs');
    }

    // Delete 
    public function delete_mhs($id_mhs)
    {
        $data = DB::table('mahasiswas')
            ->leftJoin('users', 'mahasiswas.id_mhs', '=', 'users.id_mhs')
            ->where('mahasiswas.id_mhs', $id_mhs);
        DB::table('users')->where('id_mhs', $id_mhs)->delete();

        $data->delete();
        return redirect()->route('data_mhs');
    }
}
