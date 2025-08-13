<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AttendanceManagementComponent;
use App\Livewire\PayrollGeneratorComponent;
use App\Livewire\PayrollReportComponent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendance', AttendanceManagementComponent::class)->name('attendance');
Route::get('/payroll/generate', PayrollGeneratorComponent::class)->name('payroll.generate');
Route::get('/payroll/report', PayrollReportComponent::class)->name('payroll.report');
