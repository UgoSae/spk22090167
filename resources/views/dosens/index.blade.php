@extends('layouts.app')

  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Alternatif Dosen</h1>
        <a href="{{ route('dosens.create') }}" class="btn btn-primary">Tambah Dosen</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($dosen->count() > 0)
                @foreach($dosen as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nidn }}</td>
                        <td class="align-middle">{{ $rs->nama }}</td>
                        <td class="align-middle">{{ $rs->jabatan_struktural }}</td>
                        <td class="align-middle">{{ $rs->jabatan_fungsional}}</td>  
                        <td class="align-middle">{{ $rs->kuota}}</td>
                        <td class="align-middle">{{ $rs->jumlah_publikasi}}</td>
                        <td class="align-middle">{{ $rs->ketersediaan_waktu}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('dosens.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('dosens.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Dosen not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection