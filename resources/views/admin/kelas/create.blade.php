@extends('layouts.layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Kelas Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/kelas">Data Kelas Mahasiswa</a></li>
                <li class="breadcrumb-item active">Tambah Kelas Mahasiswa</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambahkan Data Mahasiswa</h5>

                        <!-- General Form Elements -->
                        <form action="/add-data-kelas" id="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="nim_mhs" class="col-sm-2 col-form-label">Mata Kuliah</label>
                                <div class="col-sm-7">
                                    <select class="form-control js-example-responsive" name="id_makul">
                                        <option selected disabled>Pilih Mata Kuliah</option>
                                        @foreach ($pilih_makul as $makul)
                                        <option value="{{$makul->id_makul}}">{{$makul->nama_makul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control js-example-responsive" name="kode_kelas">
                                        <option selected disabled>Pilih Kelas</option>
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
                                        <option selected disabled>Pilih Dosen</option>
                                        @foreach ($pilih_dosen as $dosen)
                                        <option value="{{$dosen->id_dosen}}">{{$dosen->nama_dosen}}</option>
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