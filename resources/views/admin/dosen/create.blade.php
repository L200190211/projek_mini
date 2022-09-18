@extends('layouts.layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Dosen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/dosen">Data Dosen</a></li>
                <li class="breadcrumb-item active">Tambah Dosen</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambahkan Data Dosen</h5>

                        <!-- General Form Elements -->
                        <form action="/add-data-dosen" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-2 col-form-label">NIP Dosen</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="nip" id="" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_dosen" class="col-sm-2 col-form-label">Nama Dosen</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" type="text" name="nama_dosen" id="" required style="height: 60px" required autofocus placeholder="Masukkan nama dosen disini" aria-describedby="basic-addon2"></textarea>
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