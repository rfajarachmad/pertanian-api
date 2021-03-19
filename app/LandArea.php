<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandArea extends Model
{
    protected $table = 'land_area';
    protected $fillable = [
        'province_id', 'city_id', 'district_id', 'sub_district_id', 'land_area', 'year'
    ];
}
