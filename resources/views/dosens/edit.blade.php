@extends('layouts.app')
  
@section('title', 'Edit Data Dosen')
  
@section('contents')
    <h1 class="mb-0">Edit Data Dosen</h1>
    <hr />
    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">NIDN</label>
                <input type="text" name="nidn" class="form-control" placeholder="NIDN" value="{{ $dosen->nidn }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $dosen->nama }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jabatan Struktural</label>
                <input type="text" name="jabatan_struktural" class="form-control" placeholder="Jabatan Struktural" value="{{ $dosen->jabatan_struktural }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Jabatan Fungsional</label>
                <input type="text" name="jabatan_fungsional" class="form-control" placeholder="Jabatan Fungsional" value="{{ $dosen->jabatan_fungsional }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kuota</label>
                <input type="text" name="kuota" class="form-control" placeholder="Kuota" value="{{ $dosen->kuota }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Jumlah Publikasi</label>
                <input type="text" name="jumlah_publikasi" class="form-control" placeholder="Jumlah Publikasi" value="{{ $dosen->jumlah_publikasi }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Ketersediaan Waktu</label>
                <input type="text" name="ketersediaan_waktu" class="form-control" placeholder="Ketersediaan Waktu" value="{{ $dosen->ketersediaan_waktu }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection