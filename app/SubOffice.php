<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;

class SubOffice extends Model
{
    protected $fillable = [
        'name',
        'office_id'
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
