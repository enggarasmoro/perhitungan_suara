<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tps extends Model
{
    protected $table = 'tps';

    public static function getDesa()
    {
        $perhitungan = DB::table('tps')
            ->join('desa', 'tps.id_desa', '=', 'desa.id')
            ->join('kecamatan', 'desa.id_kec', '=', 'kecamatan.id')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('tps.*', 'kecamatan.nm_kecamatan', 'kabupaten.nm_kabupaten', 'kecamatan.id as id_kec', 'kabupaten.id as id_kab', 'desa.nm_desa')
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $perhitungan;
    }


}