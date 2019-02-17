<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public function getKabupaten()
    {
        return $this->hasOne(Kabupaten::class, 'id', 'id_kab');
    }

}