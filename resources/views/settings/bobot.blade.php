@extends('layouts.app')


@section('contents')
    <h1 class="mb-0">Pengaturan Bobot</h1>
    <hr />
    <form action="{{ route('settings.bobot.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="w_c1" class="form-label">Jabatan Struktural (C1)</label>
            <input type="number" step="0.01" class="form-control" id="w_c1" name="w_c1" value="{{ $c1['weight'] ?? '' }}" required>
            <label for="cost_c1" class="form-label">Cost/Benefit</label>
            <select class="form-control" id="cost_c1" name="cost_c1" required>
                <option value="1" {{ (isset($c1['is_cost']) && $c1['is_cost'] == 1) ? 'selected' : '' }}>Cost</option>
                <option value="0" {{ (isset($c1['is_cost']) && $c1['is_cost'] == 0) ? 'selected' : '' }}>Benefit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="w_c2" class="form-label">Jabatan Fungsional (C2)</label>
            <input type="number" step="0.01" class="form-control" id="w_c2" name="w_c2" value="{{ $c2['weight'] ?? '' }}" required>
            <label for="cost_c2" class="form-label">Cost/Benefit</label>
            <select class="form-control" id="cost_c2" name="cost_c2" required>
                <option value="1" {{ (isset($c2['is_cost']) && $c2['is_cost'] == 1) ? 'selected' : '' }}>Cost</option>
                <option value="0" {{ (isset($c2['is_cost']) && $c2['is_cost'] == 0) ? 'selected' : '' }}>Benefit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="w_c3" class="form-label">Kuota (C3)</label>
            <input type="number" step="0.01" class="form-control" id="w_c3" name="w_c3" value="{{ $c3['weight'] ?? '' }}" required>
            <label for="cost_c3" class="form-label">Cost/Benefit</label>
            <select class="form-control" id="cost_c3" name="cost_c3" required>
                <option value="1" {{ (isset($c3['is_cost']) && $c3['is_cost'] == 1) ? 'selected' : '' }}>Cost</option>
                <option value="0" {{ (isset($c3['is_cost']) && $c3['is_cost'] == 0) ? 'selected' : '' }}>Benefit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="w_c4" class="form-label">Jumlah Publikasi (C4)</label>
            <input type="number" step="0.01" class="form-control" id="w_c4" name="w_c4" value="{{ $c4['weight'] ?? '' }}" required>
            <label for="cost_c4" class="form-label">Cost/Benefit</label>
            <select class="form-control" id="cost_c4" name="cost_c4" required>
                <option value="1" {{ (isset($c4['is_cost']) && $c4['is_cost'] == 1) ? 'selected' : '' }}>Cost</option>
                <option value="0" {{ (isset($c4['is_cost']) && $c4['is_cost'] == 0) ? 'selected' : '' }}>Benefit</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="w_c5" class="form-label">Ketersediaan Waktu (C5)</label>
            <input type="number" step="0.01" class="form-control" id="w_c5" name="w_c5" value="{{ $c5['weight'] ?? '' }}" required>
            <label for="cost_c5" class="form-label">Cost/Benefit</label>
            <select class="form-control" id="cost_c5" name="cost_c5" required>
                <option value="1" {{ (isset($c5['is_cost']) && $c5['is_cost'] == 1) ? 'selected' : '' }}>Cost</option>
                <option value="0" {{ (isset($c5['is_cost']) && $c5['is_cost'] == 0) ? 'selected' : '' }}>Benefit</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection