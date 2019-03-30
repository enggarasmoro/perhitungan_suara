<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PerhitunganJatim extends Model
{
    protected $table = 'perhitungan_jatim';

    public function scopeListperhitungan()
    {
        $perhitungan = DB::table('perhitungan_jatim')
            ->join('tps', 'perhitungan_jatim.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('perhitungan_jatim.*', 'kecamatan.nm_kecamatan', 'desa.nm_desa', 'kabupaten.nm_kabupaten', 'tps.nm_tps')
            ->where('status', 1)
            ->orderBy('kabupaten.id', 'asc')
            ->orderBy('kecamatan.id', 'asc')
            ->orderBy('desa.id', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        return $perhitungan;
    }

    public static function Listkordinator($id_desa)
    {
        $perhitungan = DB::table('perhitungan_jatim')
            ->join('tps', 'perhitungan_jatim.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('perhitungan_jatim.*', 'kecamatan.nm_kecamatan', 'desa.nm_desa', 'kabupaten.nm_kabupaten', 'tps.nm_tps')
            ->where(['status' => 1, 'desa.id' => $id_desa])
            ->orderBy('kabupaten.id', 'asc')
            ->orderBy('kecamatan.id', 'asc')
            ->orderBy('desa.id', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        return $perhitungan;
    }

    public function scopeListinputperhitungan()
    {
        $perhitungan = DB::table('perhitungan_jatim')
            ->join('tps', 'perhitungan_jatim.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('perhitungan_jatim.*', 'kecamatan.nm_kecamatan', 'desa.nm_desa', 'kabupaten.nm_kabupaten', 'tps.nm_tps')
            ->where('status', 1)
            ->orderBy('perhitungan_jatim.id', 'asc')
            ->orderBy('kecamatan.id', 'asc')
            ->orderBy('desa.id', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        return $perhitungan;
    }

    public function scopeRekapperhitungan()
    {
        $rekapitulasi = DB::table('perhitungan_jatim')
            ->select(
                DB::raw('SUM(deni) as deni'),
                DB::raw('SUM(eksan) as eksan'),
                DB::raw('SUM(siti) as siti'),
                DB::raw('SUM(hery) as hery'),
                DB::raw('SUM(luluk) as luluk'),
                DB::raw('SUM(enny) as enny'),
                DB::raw('SUM(abdul) as abdul'),
                DB::raw('SUM(ely) as ely'),
                DB::raw('SUM(hesan) as hesan'),
                DB::raw('SUM(yusuf) as yusuf'),
                DB::raw('SUM(nasir) as nasir')

            )
            ->get();
        return $rekapitulasi;
    }

    public static function Rekapperhitungankordinator($id_desa)
    {
        $rekapitulasi = DB::table('perhitungan_jatim')
            ->join('tps', 'perhitungan_jatim.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select(
                DB::raw('SUM(perhitungan_jatim.deni) as deni'),
                DB::raw('SUM(perhitungan_jatim.eksan) as eksan'),
                DB::raw('SUM(perhitungan_jatim.siti) as siti'),
                DB::raw('SUM(perhitungan_jatim.hery) as hery'),
                DB::raw('SUM(perhitungan_jatim.luluk) as luluk'),
                DB::raw('SUM(perhitungan_jatim.enny) as enny'),
                DB::raw('SUM(perhitungan_jatim.abdul) as abdul'),
                DB::raw('SUM(perhitungan_jatim.ely) as ely'),
                DB::raw('SUM(perhitungan_jatim.hesan) as hesan'),
                DB::raw('SUM(perhitungan_jatim.yusuf) as yusuf'),
                DB::raw('SUM(perhitungan_jatim.nasir) as nasir')

            )
            ->where(['status' => 1, 'desa.id' => $id_desa])
            ->get();
        return $rekapitulasi;
    }
}