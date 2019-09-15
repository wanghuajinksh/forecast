<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $table = 'Measure';

    protected $fillable = [
        'nameId', 'value', 'locationId', 'forecastDate', 'date', 'localDate'
    ];
}
