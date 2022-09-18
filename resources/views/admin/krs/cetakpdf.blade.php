<div>
    <h1>Kartu Rencana Studi</h1>
    <table>
        @foreach($data2 as $data1)
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data1->nama_mhs}}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>{{$data1->nim_mhs}}</td>
        </tr>
        @endforeach
        <tr>
            <td>Universitas </td>
            <td>:</td>
            <td>Universitas Muhammadiyah Surakarta</td>
        </tr>
    </table>
    <br>
    <table style="width:100%" border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Makul</th>
                <th scope="col">Kelas</th>
                <th scope="col">Dosen Pengampu</th>
                <th scope="col" style="text-align: center;">Semester</th>
                <th scope="col" style="text-align: center;">SKS</th>
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
                <td style="text-align: center;">{{ $data2->semester}}</td>
                <td style="text-align: center;">{{ $data2->sks_makul}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <p>Disalin ke format .pdf pada <?= date("Y/m/d H:i:s"); ?></p>
</div>