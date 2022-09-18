@extends('layouts.layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Kelas Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/kelas">Data Kelas Mahasiswa</a></li>
                <li class="breadcrumb-item active">Edit Kelas Mahasiswa</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Data Kelas Mahasiswa</h5>

                        <!-- General Form Elements -->
                        <form action="/edit-data-kelas/{{$data->id_kelas}}" id="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="id_makul" class="col-sm-2 col-form-label">Mata Kuliah</label>
                                <div class="col-sm-7">
                                    <select class="form-control js-example-responsive" name="id_makul">
                                        {{--<option selected disabled value="{{ $data->id_kelas }}">{{$data->makul->nama_makul}}</option> --}}
                                        <!-- @foreach ($pilih_makul as $makul)
                                        <option value="{{$makul->id_makul}}">{{$makul->nama_makul}}</option>
                                        @endforeach -->
                                        @foreach ($pilih_makul as $makul)
                                        <option value="{{$makul->id_makul}}" {{$makul->id_makul == $data->id_makul? 'selected' : '' }}>{{$makul->nama_makul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control js-example-responsive" name="kode_kelas">
                                        {{--<option selected disabled value="{{$data->id_kelas}}">{{$data->$makul->kode_kelas}}</option> --}}
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_mhs" class="col-sm-2 col-form-label">Nama Dosen</label>
                                <div class="col-sm-10">
                                    <select class="form-control js-example-responsive" name="id_dosen">
                                        {{-- <option selected disabled value="{{ $data->id_kelas }}">{{ $data->dosen->nama_dosen }}</option> --}}
                                        @foreach ($pilih_dosen as $dosen)
                                        <option value="{{$dosen->id_dosen}}" {{$dosen->id_dosen == $data->id_dosen? 'selected' : '' }}>{{$dosen->nama_dosen}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit </button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
@endsection

@section('scriptJS')
<script>
    $(document).ready(function() {
        $(".js-example-responsive").select2({
            width: 'resolve' // need to override the changed default
        });
    });
</script>
@endsection