<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Designation;  // import post

class Employee extends Model
{
    use HasFactory;

    // use belongsTo relation(Inverse) with foreignkey & reduce read query
    public function designation(){
        return $this->belongsTo(Designation::class);
    }
}
