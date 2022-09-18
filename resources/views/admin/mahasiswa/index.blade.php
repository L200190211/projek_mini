@extends('layouts.layout')

@section('content')
<style type="text/css">
    @import url('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css');
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                                <a href="/add-mhs"><button type="submit" class="btn btn-primary">Tambah Mahasiswa</button></a>
                            </div>
                            <p class="col-sm-7 col-form-label" style="text-align: end;"><?= date("d F Y"); ?></p>
                        </div>
                        <div class="table-responsive">
                            <table id="table_id" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($data as $mhs)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $mhs->nim_mhs }}</td>
                                        <td>{{ $mhs->nama_mhs }}</td>
                                        <td>
                                            @if ($mhs->status == 0)
                                            <span class="badge bg-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Mahasiswa belum mengambil KRS">Belum KRS</span>
                                            @else
                                            <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Mahasiswa sudah mengambil KRS">Sudah KRS</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" style="width: 100%;" id="custom-disabled">
                                                <!-- button edit -->
                                                <a title="Edit Data Mahasiswa" style="width: 25%;" href='/edit-mhs/{{ $mhs->id_mhs }}' class="btn btn-sm btn-primary"><i class="ri-edit-line"></i></a>
                                                <!-- button delete -->
                                                <a title="Hapus Data Mahasiswa" style="width: 25%;" href='/delete-mhs/{{ $mhs->id_mhs }}' class="btn btn-sm btn-danger hapus"><i class="ri-delete-bin-6-fill"></i></a>
                                                <!-- button AMbil KRS -->
                                                @if ($mhs->status == 0)
                                                <a title="Ambil KRS" style="width: 25%;" href='/krs/{{ $mhs->id_mhs }}' class="btn btn-secondary"><i class="bi bi-check2-all"></i></a>
                                                @else
                                                <a style="width: 25%;" href='/krs/{{ $mhs->id_mhs }}' class="btn btn-outline-dark disabled"><i class="bi bi-check2-all"></i></a>
                                                @endif
                                                <!-- button Lihat KRS -->
                                                @if ($mhs->status == 1)
                                                <a title="Lihat KRS Mahasiswa" style="width: 25%;" href='/view-krs/{{$mhs->id_mhs}}' class="btn btn-warning"><i class="bi bi-view-list"></i></a>
                                                @else
                                                <a style="width: 25%;" href='/view-krs/{{$mhs->id_mhs}}' class="btn btn-outline-dark disabled"><i class="bi bi-view-list"></i></a>
                                                @endif
                                                <!-- button cetak -->
                                                @if ($mhs->status == 1)
                                                <a title="Cetak Data Mahasiswa" style="width: 25%;" href='/generate-pdf/{{$mhs->id_mhs}}' target="_blank" class="btn btn-dark"><i class="bi bi-printer"></i></a>
                                                @else
                                                <a style="width: 25%;" href='/generate-pdf/{{$mhs->id_mhs}}' class="btn btn-outline-dark disabled"><i class="bi bi-printer"></i></a>
                                                @endif
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