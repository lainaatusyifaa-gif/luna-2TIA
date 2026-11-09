<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
     protected $table = 'Biodata_1099';

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'no_hp',
        'alamat',
        'foto',
    ];
}
