@extends('layouts.layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Mata Kuliah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/matakuliah">Data Mata Kuliah</a></li>
                <li class="breadcrumb-item active">Tambah Mata Kuliah</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambahkan Data Mata Kuliah</h5>

                        <!-- General Form Elements -->
                        <form action="/add-data-makul" id="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="kode_makul" class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="kode_makul" id="" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_makul" class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" name="nama_makul" id="" required style="height: 60px" required autofocus placeholder="Masukkan mata kuliah disini" aria-describedby="basic-addon2"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sks_makul" class="col-sm-2 col-form-label">Jumlah SKS</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="sks_makul" id="" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="semester" id="" required autofocus>
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
        $(".js-example-tags").select2({
            tags: true,
        });
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
    });
</script>
@endsection