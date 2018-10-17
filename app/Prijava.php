<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prijava extends Model
{
    protected $table = 'prijava';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ime', 'prezime', 'ime_oca',
    ];
}
