@extends('layouts.app')


@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Hasil Normalisasi</h1>
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
            @foreach ($normalizations as $dosen_id => $normalization)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $normalization['nidn'] }}</td>
                    <td>{{ $normalization['nama'] }}</td>
                    <td>{{ $normalization['c1'] }}</td>
                    <td>{{ $normalization['c2'] }}</td>
                    <td>{{ $normalization['c3'] }}</td>
                    <td>{{ $normalization['c4'] }}</td>
                    <td>{{ $normalization['c5'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection