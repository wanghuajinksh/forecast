<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardinality extends Model
{
    protected $table = 'Cardinality';

    protected $fillable = [
        'cardinalityId', 'name'
    ];
}
