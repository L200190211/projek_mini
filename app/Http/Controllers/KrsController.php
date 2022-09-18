<?php

namespace App\Http\Controllers;

use App\Models\krs;
use App\Models\dosen;
use App\Models\kelas;
use App\Models\makul;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;


class KrsController extends Controller
{
    // View
    public function data_krs(Request $request, $id_mhs)
    {
        $data = DB::table('kelas')
            ->join('makul', 'makul.id_makul', '=', 'kelas.id_makul',)
            ->join('dosen', 'kelas.id_dosen', '=', 'dosen.id_dosen')
            ->select('*')
            ->orderBy('semester')
            ->get();

        $id = $id_mhs;
        return view('admin.krs.index', compact('data', 'id'));
    }

    public function add_data_krs(Request $request, $id_mhs)
    {
        // dd($request);
        $ambil = $request->ambil;
        $mhs = mahasiswa::find($id_mhs);
        // $hasil = '';
        $id = $id_mhs;

        for ($i = 0; $i < count($ambil); $i++) {

            $data = array(
                'id_mhs' => $id,
                'id_makul' => $ambil[$i]
            );
            krs::create($data);
        }


        if ($mhs->status == 0) {
            $mhs->status = '1';
            $mhs->save();
        }

        return redirect()->route('data_mhs');
    }

    public function view_krs(Request $request, $id_mhs)
    {
        $id = $id_mhs;
        $data = DB::table('krs')
            ->join('mahasiswas', 'krs.id_mhs', '=', 'mahasiswas.id_mhs')
            ->join('makul', 'krs.id_makul', '=', 'makul.id_makul',)
            ->join('kelas', 'kelas.id_kelas', '=', 'makul.id_makul',)
            ->join('dosen', 'kelas.id_dosen', '=', 'dosen.id_dosen')
            ->where('krs.id_mhs', '=', $id_mhs)
            ->select('*')
            ->get();

        return view('admin.krs.viewkrs', compact('data', 'id'));
    }

    public function generatePDF(Request $request, $id_mhs)
    {
        $id = $id_mhs;
        $data = DB::table('krs')
            ->join('mahasiswas', 'krs.id_mhs', '=', 'mahasiswas.id_mhs')
            ->join('makul', 'krs.id_makul', '=', 'makul.id_makul',)
            ->join('kelas', 'kelas.id_kelas', '=', 'makul.id_makul',)
            ->join('dosen', 'kelas.id_dosen', '=', 'dosen.id_dosen')
            ->where('krs.id_mhs', '=', $id)
            ->select('*')
            ->get();

        $data2 = DB::table('mahasiswas')
            ->where('id_mhs', '=', $id)
            ->get();

        $pdf = PDF::loadView('admin.krs.cetakpdf', compact('data', 'id', 'data2'));
        return $pdf->stream();
    }
}
