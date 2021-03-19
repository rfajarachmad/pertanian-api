<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    protected $table = 'funding';
    protected $fillable = [
        'code', 'name', 'description', 'status'
    ];
}
