<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Setting;

class JarakController extends Controller
{
    public function distance()
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

        // Cari solusi ideal positif dan negatif
        $idealPositive = [
            'c1' => $weights['c1']['is_cost'] ? min(array_column($weightedNormalizations, 'c1')) : max(array_column($weightedNormalizations, 'c1')),
            'c2' => $weights['c2']['is_cost'] ? min(array_column($weightedNormalizations, 'c2')) : max(array_column($weightedNormalizations, 'c2')),
            'c3' => $weights['c3']['is_cost'] ? min(array_column($weightedNormalizations, 'c3')) : max(array_column($weightedNormalizations, 'c3')),
            'c4' => $weights['c4']['is_cost'] ? min(array_column($weightedNormalizations, 'c4')) : max(array_column($weightedNormalizations, 'c4')),
            'c5' => $weights['c5']['is_cost'] ? min(array_column($weightedNormalizations, 'c5')) : max(array_column($weightedNormalizations, 'c5')),
        ];

        $idealNegative = [
            'c1' => $weights['c1']['is_cost'] ? max(array_column($weightedNormalizations, 'c1')) : min(array_column($weightedNormalizations, 'c1')),
            'c2' => $weights['c2']['is_cost'] ? max(array_column($weightedNormalizations, 'c2')) : min(array_column($weightedNormalizations, 'c2')),
            'c3' => $weights['c3']['is_cost'] ? max(array_column($weightedNormalizations, 'c3')) : min(array_column($weightedNormalizations, 'c3')),
            'c4' => $weights['c4']['is_cost'] ? max(array_column($weightedNormalizations, 'c4')) : min(array_column($weightedNormalizations, 'c4')),
            'c5' => $weights['c5']['is_cost'] ? max(array_column($weightedNormalizations, 'c5')) : min(array_column($weightedNormalizations, 'c5')),
        ];

        $distances = [];

        // Hitung jarak Euclidean untuk setiap dosen
        foreach ($weightedNormalizations as $id => $weightedNormalization) {
            $distancePositive = sqrt(
                ($weightedNormalization['c1'] - $idealPositive['c1']) ** 2 +
                ($weightedNormalization['c2'] - $idealPositive['c2']) ** 2 +
                ($weightedNormalization['c3'] - $idealPositive['c3']) ** 2 +
                ($weightedNormalization['c4'] - $idealPositive['c4']) ** 2 +
                ($weightedNormalization['c5'] - $idealPositive['c5']) ** 2
            );

            $distanceNegative = sqrt(
                ($weightedNormalization['c1'] - $idealNegative['c1']) ** 2 +
                ($weightedNormalization['c2'] - $idealNegative['c2']) ** 2 +
                ($weightedNormalization['c3'] - $idealNegative['c3']) ** 2 +
                ($weightedNormalization['c4'] - $idealNegative['c4']) ** 2 +
                ($weightedNormalization['c5'] - $idealNegative['c5']) ** 2
            );

            $distances[] = [
                'nidn' => $weightedNormalization['nidn'],
                'nama' => $weightedNormalization['nama'],
                'distance_positive' => $distancePositive,
                'distance_negative' => $distanceNegative,
            ];
        }

        return view('topsis.jarak', compact('distances'));
    }
}
