<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareInfo extends Model
{
    protected $fillabel = [
        'name',
        'url',
        'username',
        'password',
        'sub_office_id'
    ];
}
