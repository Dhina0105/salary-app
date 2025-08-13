<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payroll;
use App\Models\Employee;

class PayrollReportComponent extends Component
{
    use withPagination;

    public $employees,$employee_id,$month;

    public function mount(){
        $this->employees = Employee::orderBy('name')->get();
    }
    public function render()
    {
        $query = Payroll::with('employee');

        if($this->month){
            $year = substr($this->month,0,4);
            $mon = substr($this->month,5,2);
            $query->whereYear('start_date,$year')->whereMonth('start_date',$mon);
        }
        if($this->employee_id){
            $query->where('employee_id',$this->employee_id);
        }

        $payrolls = $query->orderBy('start_date','desc')->paginate(15);
        return view('livewire.payroll-report-component',compact('payrolls'));
    }
}
