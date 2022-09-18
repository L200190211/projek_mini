@extends('layouts.layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/mahasiswa">Data Mahasiswa</a></li>
                <li class="breadcrumb-item active">Tambah Mahasiswa</li>
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
                        <form action="/add-data-mhs" id="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="nim_mhs" class="col-sm-2 col-form-label">NIM Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input required autofocus class="form-control" type="text" name="nim_mhs" id="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_mhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <textarea required autofocus class="form-control" type="text" name="nama_mhs" id="nama_mhs" required style="height: 60px" placeholder="Masukkan nama mahasiswa disini" aria-describedby="basic-addon2"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input required autofocus class="form-control" type="text" name="email" id="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_tlp" class="col-sm-2 col-form-label">No Tlpn</label>
                                <div class="col-sm-10">
                                    <input required autofocus class="form-control" type="number" name="no_tlp" id="no_tlp">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea required autofocus class="form-control" type="text" name="alamat" id="alamat" style="height: 90px" placeholder="Masukkan deskripsi buku disini" aria-describedby="basic-addon2"></textarea>
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