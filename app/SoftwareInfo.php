<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareInfo extends Model
{
    protected $guarded = [
        '_token',
        'office_id'
    ];
}
