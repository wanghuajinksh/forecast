<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'Location';

    protected $fillable = [
        'locationId', 'name'
    ];

    public function measures()
    {
        return hasMany('App\Measure', 'locationId', 'locationId');
    }
}
