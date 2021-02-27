<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Employee;  // import Employee

class Designation extends Model
{
    use HasFactory;

    // use hasMany relation with foreignkey & reduce read query
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
