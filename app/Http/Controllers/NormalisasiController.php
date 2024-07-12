<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Setting;

use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function normalisasi()
    {
        $dosens = Dosen::all();
        $weights = [
            'c1' => json_decode(Setting::getValue('c1'), true),
            'c2' => json_decode(Setting::getValue('c2'), true),
            'c3' => json_decode(Setting::getValue('c3'), true),
            'c4' => json_decode(Setting::getValue('c4'), true),
            'c5' => json_decode(Setting::getValue('c5'), true)
        ];

        $normalizations = [];

        // Hitung matriks normalisasi
        foreach ($dosens as $dosen) {
            $normalizations[$dosen->id] = [
                'nidn' => $dosen->nidn,
                'nama' => $dosen->nama,
                'c1' => $dosen->jabatan_struktural / sqrt(array_sum(array_map(function ($d) {
                    return $d['jabatan_struktural'] ** 2;
                }, $dosens->toArray()))),
                'c2' => $dosen->jabatan_fungsional / sqrt(array_sum(array_map(function ($d) {
                    return $d['jabatan_fungsional'] ** 2;
                }, $dosens->toArray()))),
                'c3' => $dosen->kuota / sqrt(array_sum(array_map(function ($d) {
                    return $d['kuota'] ** 2;
                }, $dosens->toArray()))),
                'c4' => $dosen->jumlah_publikasi / sqrt(array_sum(array_map(function ($d) {
                    return $d['jumlah_publikasi'] ** 2;
                }, $dosens->toArray()))),
                'c5' => $dosen->ketersediaan_waktu / sqrt(array_sum(array_map(function ($d) {
                    return $d['ketersediaan_waktu'] ** 2;
                }, $dosens->toArray()))),
            ];
        }

        return view('topsis.normalisasi', compact('normalizations'));
    }
}
