<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\Attendance;

class AttendanceManagementComponent extends Component
{
    use WithPagination;

    public $employees,$employee_id,$date,$hours_worked;

    protected $rules =[
        'employee_id'=> 'required|exists:employees,id',
        'date'=> 'required|date',
        'hours_worked' => 'required|numeric|min:0|max:24',
    ];
    public function mount(){
        $this->employees = Employee::orderBy('name')->get();
        $this->date = date('d-m-Y');
    }
    public function saveAttendance(){
        $this->validate();

        Attendance::UpdateOrCreate(
            ['employee_id' => $this->employee_id, 'date' => $this->date],
            ['hours_worked'=> $this->hours_worked]
        );

        session()->flash('success','attendance saved');
        $this->reset('employee_id', 'hours_worked');
    }
    public function render()
    {
        $records = Attendance::with('employee')->latest()->paginate(10);
        return view('livewire.attendance-management-component',compact('records'));
    }
}
