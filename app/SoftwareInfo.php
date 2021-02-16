<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubOffice;

class SoftwareInfo extends Model
{
    protected $guarded = [
        '_token',
        'office_id'
    ];

    public function subOffice()
    {
        return $this->belongsTo(SubOffice::class);
    }
}
