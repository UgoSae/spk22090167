@extends('layouts.app')


@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Nilai Preferensi dan Ranking</h1>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Ranking</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Nilai Preferensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preferences as $index => $preference)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $preference['nidn'] }}</td>
                    <td>{{ $preference['nama'] }}</td>
                    <td>{{ $preference['nilai_preferensi'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection