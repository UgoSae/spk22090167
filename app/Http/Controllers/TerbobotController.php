<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Setting;

class TerbobotController extends Controller
{
    public function normalisasiTerbobot()
    {
        $dosens = Dosen::all();
        $weights = [
            'c1' => json_decode(Setting::getValue('c1'), true),
            'c2' => json_decode(Setting::getValue('c2'), true),
            'c3' => json_decode(Setting::getValue('c3'), true),
            'c4' => json_decode(Setting::getValue('c4'), true),
            'c5' => json_decode(Setting::getValue('c5'), true)
        ];

        $weightedNormalizations = [];

        // Hitung matriks normalisasi terbobot
        foreach ($dosens as $dosen) {
            $c1_normalized = $dosen->jabatan_struktural / sqrt(array_sum(array_map(function ($d) {
                return $d['jabatan_struktural'] ** 2;
            }, $dosens->toArray())));
            $c2_normalized = $dosen->jabatan_fungsional / sqrt(array_sum(array_map(function ($d) {
                return $d['jabatan_fungsional'] ** 2;
            }, $dosens->toArray())));
            $c3_normalized = $dosen->kuota / sqrt(array_sum(array_map(function ($d) {
                return $d['kuota'] ** 2;
            }, $dosens->toArray())));
            $c4_normalized = $dosen->jumlah_publikasi / sqrt(array_sum(array_map(function ($d) {
                return $d['jumlah_publikasi'] ** 2;
            }, $dosens->toArray())));
            $c5_normalized = $dosen->ketersediaan_waktu / sqrt(array_sum(array_map(function ($d) {
                return $d['ketersediaan_waktu'] ** 2;
            }, $dosens->toArray())));

            // Hitung matriks normalisasi terbobot
            $weightedNormalizations[$dosen->id] = [
                'nidn' => $dosen->nidn,
                'nama' => $dosen->nama,
                'c1' => $c1_normalized * $weights['c1']['weight'],
                'c2' => $c2_normalized * $weights['c2']['weight'],
                'c3' => $c3_normalized * $weights['c3']['weight'],
                'c4' => $c4_normalized * $weights['c4']['weight'],
                'c5' => $c5_normalized * $weights['c5']['weight'],
            ];
        }

        return view('topsis.terbobot', compact('weightedNormalizations'));
    }
}
