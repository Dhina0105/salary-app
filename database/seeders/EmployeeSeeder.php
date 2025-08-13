<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' =>'Dhinakaran',
            'email'=> 'dhinakaranr444@gmail.com',
            'salary_type' => 'weekly',
            'hourly_rate' => 150
        ]);

        Employee::create([
            'name' => 'Vinoth',
            'email' => 'vinoth@gmail.com',
            'salary_type' => 'monthly',
            'monthly_amount' => 25000,
        ]);
    }
}
