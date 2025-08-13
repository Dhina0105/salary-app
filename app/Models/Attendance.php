<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable =['employee_id','date','hours_worked'];

    protected $dates = ['date'=>'date'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
