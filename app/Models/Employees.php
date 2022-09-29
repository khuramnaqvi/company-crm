<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    public function campanyname()
    {
        return $this->belongsTo('App\Models\Companies','company_id','id');
    }
}
