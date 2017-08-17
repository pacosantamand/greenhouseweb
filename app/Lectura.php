<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    protected $table = 'lecturas';

    protected $fillable = ['invernadero','variable','valor'];

}
