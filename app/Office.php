<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubOffice;

class Office extends Model
{
    protected $fillable = [
        'name'      
    ];

    public function subOffices()
    {
        return $this->hasMany(SubOffice::class);
    }
}
