@extends('layouts.layout')

@section('content')
<style type="text/css">
    @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Mata Kuliah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active">Data Mata Kuliah</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 mt-4">
                            <div class="col-sm-5">
                                <a href="/add-makul"><button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button></a>
                            </div>
                            <p class="col-sm-7 col-form-label" style="text-align: end;"><?= date("d F Y"); ?></p>
                        </div>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Makul</th>
                                        <th scope="col">Nama Mata Kuliah</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($data as $makul)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $makul->kode_makul }}</td>
                                        <td>{{ $makul->nama_makul }}</td>
                                        <td>{{ $makul->sks_makul }}</td>
                                        <td>{{ $makul->semester }}</td>
                                        <td>
                                            <div class="btn-group" role="group" style="width: 100%;" id="custom-disabled">
                                                <!-- button edit -->
                                                <a title="Edit Data Mata Kuliah" style="width: 25%;" href='/edit-makul/{{ $makul->id_makul }}' class="btn btn-sm btn-primary"><i class="ri-edit-line"></i></a>
                                                <!-- button delete -->
                                                <a title="Hapus Data Mata Kuliah" style="width: 25%;" href='/delete-makul/{{ $makul->id_makul }}' class="btn btn-sm btn-danger hapus"><i class="ri-delete-bin-6-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

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