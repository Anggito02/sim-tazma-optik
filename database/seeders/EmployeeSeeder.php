<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::create([
            'username' => 'test123',
            'nik' => '12345678',
            'employee_name' => 'Test',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Head of Software Engineer',
            'role' => 'administrator',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'rudy123',
            'nik' => '123456789',
            'employee_name' => 'Rudy',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Senior Staff of Software Engineer',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test1234',
            'nik' => '1234567890',
            'employee_name' => 'Test 2',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Staff of Software Engineer',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test12345',
            'nik' => '12345678901',
            'employee_name' => 'Test 3',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Staff of Software Engineer',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test123456',
            'nik' => '123456789012',
            'employee_name' => 'Test 4',
            'department' => 'Sales',
            'section' => 'Sales',
            'position' => 'Head of Sales',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test1234567',
            'nik' => '1234567890123',
            'employee_name' => 'Test 5',
            'department' => 'Sales',
            'section' => 'Sales',
            'position' => 'Staff of Sales',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test12345678',
            'nik' => '12345678901234',
            'employee_name' => 'Test 6',
            'department' => 'Sales',
            'section' => 'Sales',
            'position' => 'Staff of Sales',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test123456789',
            'nik' => '123456789012345',
            'employee_name' => 'Test 7',
            'department' => 'Business Development',
            'section' => 'Research',
            'position' => 'Head of Research',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

        Employee::create([
            'username' => 'test1234567890',
            'nik' => '1234567890123456',
            'employee_name' => 'Test 8',
            'department' => 'Business Development',
            'section' => 'Research',
            'position' => 'Staff of Research',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
        ]);

    }
}
