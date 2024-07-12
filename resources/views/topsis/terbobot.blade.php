@extends('layouts.app')



@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Hasil Normalisasi Terbobot</h1>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Jabatan Struktural</th>
                <th>Jabatan Fungsional</th>
                <th>Kuota</th>
                <th>Jumlah Publikasi</th>
                <th>Ketersediaan Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weightedNormalizations as $dosen_id => $weightedNormalization)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $weightedNormalization['nidn'] }}</td>
                    <td>{{ $weightedNormalization['nama'] }}</td>
                    <td>{{ $weightedNormalization['c1'] }}</td>
                    <td>{{ $weightedNormalization['c2'] }}</td>
                    <td>{{ $weightedNormalization['c3'] }}</td>
                    <td>{{ $weightedNormalization['c4'] }}</td>
                    <td>{{ $weightedNormalization['c5'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection