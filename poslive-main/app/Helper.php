<?php

use App\Models\Bulan;

if (!function_exists('idr')) {
    function idr($value)
    {
        return "Rp." . number_format($value, 0, ',', '.');
    }
}

if (!function_exists('tanggal')) {
    function tanggal($tgl)
    {
        if ($tgl == null) {
            return '';
        }
        $bulan = date('n', strtotime($tgl));
        $b = Bulan::where('id', $bulan)->pluck('nama')->first();
        $t = date('d', strtotime($tgl));
        $ta = date('Y', strtotime($tgl));
        return $t . ' ' . $b . ' ' . $ta;
    }
}
