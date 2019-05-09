<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OdabirSmjera extends Model
{
    protected $table = 'prijava_smjer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prijava', 'smjer', 'izbor','bodovi',
    ];
}
