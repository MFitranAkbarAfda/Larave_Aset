<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'tb_aset';

    protected $fillable = ['kode_aset','nama_aset','jumlah','merk','desc'];

    protected $primaryKey = 'id';

    public $timestamps = false;
}
