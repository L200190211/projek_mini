@extends('layouts.layout')

@section('content')
<style type="text/css">
    @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Dosen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active">Data Dosen</li>
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
                                <a href="/add-dosen"><button type="submit" class="btn btn-primary">Tambah Dosen</button></a>
                            </div>
                            <p class="col-sm-7 col-form-label" style="text-align: end;"><?= date("d F Y"); ?></p>
                        </div>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP Dosen</th>
                                        <th scope="col">Nama Dosen</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($data as $dosen)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $dosen->nip }}</td>
                                        <td>{{ $dosen->nama_dosen }}</td>
                                        <td>
                                            <div class="btn-group" role="group" style="width: 100%;" id="custom-disabled">
                                                <!-- button edit -->
                                                <a title="Edit Data Dosen" style="width: 25%;" href='/edit-dosen/{{ $dosen->id_dosen }}' class="btn btn-sm btn-primary"><i class="ri-edit-line"></i></a>
                                                <!-- button delete -->
                                                <a title="Hapus Data Dosen" style="width: 25%;" href='/delete-dosen/{{ $dosen->id_dosen }}' class="btn btn-sm btn-danger hapus"><i class="ri-delete-bin-6-fill"></i></a>
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