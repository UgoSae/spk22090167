@extends('layouts.app')


@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Solusi Ideal Positif dan Negatif</h1>
    </div>
    <hr />
    <h2>Solusi Ideal Positif (A<sup>+</sup>)</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Kriteria</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jabatan Struktural (C1)</td>
                <td>{{ $idealPositive['c1'] }}</td>
            </tr>
            <tr>
                <td>Jabatan Fungsional (C2)</td>
                <td>{{ $idealPositive['c2'] }}</td>
            </tr>
            <tr>
                <td>Kuota (C3)</td>
                <td>{{ $idealPositive['c3'] }}</td>
            </tr>
            <tr>
                <td>Jumlah Publikasi (C4)</td>
                <td>{{ $idealPositive['c4'] }}</td>
            </tr>
            <tr>
                <td>Ketersediaan Waktu (C5)</td>
                <td>{{ $idealPositive['c5'] }}</td>
            </tr>
        </tbody>
    </table>
    <h2>Solusi Ideal Negatif (A<sup>-</sup>)</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Kriteria</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jabatan Struktural (C1)</td>
                <td>{{ $idealNegative['c1'] }}</td>
            </tr>
            <tr>
                <td>Jabatan Fungsional (C2)</td>
                <td>{{ $idealNegative['c2'] }}</td>
            </tr>
            <tr>
                <td>Kuota (C3)</td>
                <td>{{ $idealNegative['c3'] }}</td>
            </tr>
            <tr>
                <td>Jumlah Publikasi (C4)</td>
                <td>{{ $idealNegative['c4'] }}</td>
            </tr>
            <tr>
                <td>Ketersediaan Waktu (C5)</td>
                <td>{{ $idealNegative['c5'] }}</td>
            </tr>
        </tbody>
    </table>
@endsection