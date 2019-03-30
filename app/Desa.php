<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Desa extends Model
{
    protected $table = 'desa';

    public function scopeListdesa()
    {
        $perhitungan = DB::table('desa')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('desa.*', 'kecamatan.nm_kecamatan', 'kabupaten.nm_kabupaten', 'kecamatan.id as id_kec', 'kabupaten.id as id_kab')
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }

    public function scopeDropdowndesa()
    {
        $perhitungan = DB::table('tps')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('tps.*')
            ->where('kabupaten.id', 2)
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }

    public static function getNamaKec($id_desa)
    {
        $perhitungan = DB::table('desa')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->select('kecamatan.nm_kecamatan')
            ->where('desa.id', $id_desa)
            ->first();
        return $perhitungan;
    }

    public static function Listdropdown($id_kec)
    {
        $perhitungan = DB::table('tps')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('tps.*', 'desa.nm_desa')
            ->where(['kabupaten.id' => 2, 'kecamatan.id' => $id_kec])
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }

    public static function Listdropdownjatim($id_kec)
    {
        $perhitungan = DB::table('tps')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('tps.*', 'desa.nm_desa')
            ->where(['kecamatan.id' => $id_kec])
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }
}