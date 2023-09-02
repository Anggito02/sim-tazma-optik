<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'employee_name' => 'Test',
            'nik' => '12345678',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '08123456782',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Head of Software Engineer',
            'role' => 'administrator',
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);

        User::create([
            'email' => 'rudy@gmail.com',
            'password' => Hash::make('12345678'),
            'employee_name' => 'Rudy',
            'nik' => '123456789',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '0812345678',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Senior Staff of Software Engineer',
            'role' => 'user',
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);
    }
}

?>
