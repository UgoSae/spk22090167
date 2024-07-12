@extends('layouts.app')
  
@section('title', 'Create Dosen')
  
@section('contents')
    <h1 class="mb-0">Tambah Dosen</h1>
    <hr />
    <form action="{{ route('dosens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Dosen">
            </div>
            <div class="col">
                <label class="form-label">NIDN</label>
                <input type="text" name="nidn" class="form-control" placeholder="NIDN">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jabatan Struktural</label>
                <input type="text" name="jabatan_struktural" class="form-control" placeholder="Masukkan Angka Untuk Kriteria">
            </div>
            <div class="col">
                <label class="form-label">Jabatan Fungsional</label>
                <input type="text" name="jabatan_fungsional" class="form-control" placeholder="Masukkan Angka Untuk Kriteria">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Kuota</label>
                <input type="text" name="kuota" class="form-control" placeholder="Masukkan Angka Untuk Kriteria">
            </div>
            <div class="col">
                <label class="form-label">Jumlah Publikasi</label>
                <input type="text" name="jumlah_publikasi" class="form-control" placeholder="Masukkan Angka Untuk Kriteria">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Ketersediaan Waktu</label>
                <input type="text" name="ketersediaan_waktu" class="form-control" placeholder="Masukkan Angka Untuk Kriteria">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>
@endsection