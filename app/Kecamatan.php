<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::class, 'id', 'id_kab');
    }

    public function scopeDropdownkecamatan()
    {
        $kecamatan = DB::table('kecamatan')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('kecamatan.*')
            ->where('kabupaten.id', 2)
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $kecamatan;
    }

    public function scopeDropdownkecamatanAll()
    {
        $kecamatan = DB::table('kecamatan')
            ->join('kabupaten', 'kecamatan.id_kab', '=', 'kabupaten.id')
            ->select('kecamatan.*')
            ->orderBy('kabupaten.id', 'desc')
            ->orderBy('kecamatan.id', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return $kecamatan;
    }
}