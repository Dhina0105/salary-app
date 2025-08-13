<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =['name','email','salary_type','monthly_amount','hourly_rate'];

    
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
    public function payrolls(){
        return $this->hasMany(Payroll::class);
    }
}
