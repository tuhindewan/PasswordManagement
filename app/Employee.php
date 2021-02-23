<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SoftwareInfo;

class Employee extends Model
{
    public $table = 'employees';
    protected $guarded = [
        '_token',
        'office_id',
        'sub_office_id'
    ];

    public function software()
    {
        return $this->belongsTo(SoftwareInfo::class);
    }
}
