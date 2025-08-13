<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Payroll;
use Carbon\Carbon;

class PayrollGeneratorComponent extends Component
{
    use WithPagination;

    public $start_date, $end_date;

    protected $rules = [
        'start_date' => 'required|date',
        'end_date'   => 'required|date|after_or_equal:start_date',
    ];

    public function mount()
    {
        
        $this->start_date = Carbon::now()->startOfWeek();
        $this->end_date   = Carbon::now()->endOfWeek();
    }

    public function generatePayroll()
    {
        $this->validate();

        $employees = Employee::all();

        foreach ($employees as $employee) {
            if ($employee->salary_type === 'weekly') {
                $hours = Attendance::where('employee_id', $employee->id)
                    ->whereBetween('date', [
                        $this->start_date->toDateString(),
                        $this->end_date->toDateString()
                    ])
                    ->sum('hours_worked');

                $amount = round($hours * ($employee->hourly_rate ?? 0), 2);
            } else {
                $hours  = null;
                $amount = round($employee->monthly_amount ?? 0, 2);
            }

            Payroll::updateOrCreate(
                [
                    'employee_id' => $employee->id,
                    'type'        => $employee->salary_type,
                    'start_date'  => Carbon::parse($this->start_date)->toDateString(),
                    'end_date'    => Carbon::parse($this->end_date)->toDateString()
                ],
                [
                    'total_hours' => $hours,
                    'amount'      => $amount,
                ]
            );
        }

        session()->flash('success', 'Payroll generated successfully');
    }

    public function render()
    {
        $payrolls = Payroll::with('employee')->latest()->paginate(10);

        return view('livewire.payroll-generator-component', [
            'payrolls' => $payrolls,
        ]);
    }
}
