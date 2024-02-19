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
            'username' => 'Test',
            'nik' => '12345678',
            'nip' => '12345678',
            'employee_name' => 'Test',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '08123456782',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Head of Software Engineer',
            'role' => 'administrator',
            'plant' => 'Jakarta',
            'status' => true,
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);

        User::create([
            'email' => 'rudy@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'Rudy',
            'nik' => '123456789',
            'nip' => '123456789',
            'employee_name' => 'Rudy',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '0812345678',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Senior Staff of Software Engineer',
            'role' => 'user',
            'plant' => 'Jakarta',
            'status' => true,
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);

        User::create([
            'email' => 'damas@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'Damas',
            'nik' => '1234567890',
            'nip' => '1234567890',
            'employee_name' => 'Damas',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '08123456789',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Staff of Software Engineer',
            'role' => 'administrator',
            'plant' => 'Jakarta',
            'status' => true,
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);

        User::create([
            'email' => 'anggito@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'Anggito',
            'nik' => '12345678901',
            'nip' => '12345678901',
            'employee_name' => 'Anggito',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '081234567891',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Staff of Software Engineer',
            'role' => 'administrator',
            'plant' => 'Jakarta',
            'status' => true,
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);

        User::create([
            'email' => 'dito@gmail.com',
            'password' => Hash::make('12345678'),
            'username' => 'Dito',
            'nik' => '123456789012',
            'nip' => '123456789012',
            'employee_name' => 'Dito',
            'photo' => 'foto.png',
            'gender' => 'laki-laki',
            'address' => 'Jl. Test',
            'phone' => '0812345678912',
            'department' => 'IT',
            'section' => 'Software Engineer',
            'position' => 'Staff of Software Engineer',
            'role' => 'administrator',
            'plant' => 'Jakarta',
            'status' => true,
            'group' => 'IT',
            'domicile' => 'Jakarta'
        ]);
    }
}

?>
