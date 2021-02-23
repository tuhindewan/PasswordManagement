<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [
        '_token',
        'office_id',
        'sub_office_id'
    ];
}
