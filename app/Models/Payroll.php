<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    protected  $fillable =['employee_id','type','start_date','end_date','total_hours','amount'];

    protected $dates = ['start_date' => 'date','end_date'=>'date'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
