@extends('layouts.layout')

@section('content')
<style type="text/css">
    @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Ambil KRS</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/mahasiswa">Data Mahasiswa</a></li>
                <li class="breadcrumb-item active">KRS Mahasiswa </li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambahkan Data KRS Mahasiswa</h5>

                        <!-- General Form Elements -->
                        <form action="/add-data-krs/{{$id}}" id="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3 mt-4">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table_id" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Makul</th>
                                                    <th scope="col">Kelas</th>
                                                    <th scope="col">Dosen Pengampu</th>
                                                    <th scope="col" style="text-align: center;">SKS</th>
                                                    <th scope="col" style="text-align: center;">Semester</th>
                                                    <th scope="col">Pilih</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach($data as $data2)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ $data2->nama_makul}}</td>
                                                    <td style="text-align: center;">{{ $data2->kode_kelas}}</td>
                                                    <td>{{ $data2->nama_dosen}}</td>
                                                    <td style="text-align: center;">{{ $data2->sks_makul}}</td>
                                                    <td style="text-align: center;">{{ $data2->semester}}</td>
                                                    <td style="text-align: center;">
                                                        <input type="checkbox" name="ambil[]" value="{{ $data2->id_makul}}">
                                                    </td>
                                                </tr>@endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class=" row mb-3">
                                    <div class="col-sm-12">
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
    $(document).ready(function() {
        $('#table_id').DataTable({
            // responsive: true,
            scrollX: true,
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable": "Tidads",
            }

        });
    });
</script>
@endsection