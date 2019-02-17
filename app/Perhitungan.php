<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Perhitungan extends Model
{
    protected $table = 'perhitungan';

    public function scopeListperhitungan()
    {
        $perhitungan = DB::table('perhitungan')
            ->join('tps', 'perhitungan.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('perhitungan.*', 'kecamatan.nm_kecamatan', 'desa.nm_desa', 'kabupaten.nm_kabupaten', 'tps.nm_tps')
            ->where('status', 1)
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('desa.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }

    public static function Listkordinator($id_desa)
    {
        $perhitungan = DB::table('perhitungan')
            ->join('tps', 'perhitungan.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('perhitungan.*', 'kecamatan.nm_kecamatan', 'desa.nm_desa', 'kabupaten.nm_kabupaten', 'tps.nm_tps')
            ->where(['status' => 1, 'desa.id' => $id_desa])
            // ->where('status', 1)
            // ->where('desa.id', 13)
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }

    public function scopeRekapperhitungan()
    {
        $rekapitulasi = DB::table('perhitungan')
            ->select(
                DB::raw('SUM(dedy) as dedy'),
                DB::raw('SUM(aisyah) as aisyah'),
                DB::raw('SUM(suwarno) as suwarno'),
                DB::raw('SUM(mufaridah) as mufaridah'),
                DB::raw('SUM(ruly) as ruly'),
                DB::raw('SUM(syahrul) as syahrul'),
                DB::raw('SUM(toha) as toha'),
                DB::raw('SUM(joko) as joko'),
                DB::raw('SUM(wahyuni) as wahyuni')
            )
            ->get();
        return $rekapitulasi;
    }

    public static function Rekapperhitungankordinator($id_desa)
    {
        $rekapitulasi = DB::table('perhitungan')
            ->join('tps', 'perhitungan.id_tps', '=', 'tps.id')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select(
                DB::raw('SUM(perhitungan.dedy) as dedy'),
                DB::raw('SUM(perhitungan.aisyah) as aisyah'),
                DB::raw('SUM(perhitungan.suwarno) as suwarno'),
                DB::raw('SUM(perhitungan.mufaridah) as mufaridah'),
                DB::raw('SUM(perhitungan.ruly) as ruly'),
                DB::raw('SUM(perhitungan.syahrul) as syahrul'),
                DB::raw('SUM(perhitungan.toha) as toha'),
                DB::raw('SUM(perhitungan.joko) as joko'),
                DB::raw('SUM(perhitungan.wahyuni) as wahyuni')
            )
            ->where(['status' => 1, 'desa.id' => $id_desa])
            ->get();
        return $rekapitulasi;
    }

}