<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prime extends Model
{
    protected $fillable = [
        'value',
        'times'
    ];
}
