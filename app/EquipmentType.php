<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    protected $table = 'equipment_type';
    protected $fillable = [
        'code', 'name', 'description', 'capacity', 'status'
    ];
}
