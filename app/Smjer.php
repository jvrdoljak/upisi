<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smjer extends Model
{
    protected $table = 'smjerovi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv'
    ];
}
