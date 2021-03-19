<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'reg_no',
        'province_id', 
        'city_id', 
        'district_id', 
        'sub_district_id',
        'loc_addr_detail', 
        'type_id',
        'land_area', 
        'year',
        'funding_id',
        'condition',
        'owner',
        'ownership',
        'note',
        'report_url',
        'status',
        'created_by',
        'verified_by'
    ];
}
