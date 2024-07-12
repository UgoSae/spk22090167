@extends('layouts.app')


@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Jarak ke Solusi Ideal Positif dan Negatif</h1>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Jarak ke Solusi Ideal Positif (D<sup>+</sup>)</th>
                <th>Jarak ke Solusi Ideal Negatif (D<sup>-</sup>)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($distances as $distance)
                <tr>
                    <td>{{ $distance['nidn'] }}</td>
                    <td>{{ $distance['nama'] }}</td>
                    <td>{{ $distance['distance_positive'] }}</td>
                    <td>{{ $distance['distance_negative'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection