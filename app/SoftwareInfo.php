<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubOffice;
use App\Employee;

class SoftwareInfo extends Model
{
    public $table = 'software_infos';
    protected $guarded = [
        '_token',
        'office_id'
    ];

    public function subOffice()
    {
        return $this->belongsTo(SubOffice::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
