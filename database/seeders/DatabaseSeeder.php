<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $Data = [
            [
                'email' => 'tester@gmail.com',
                'password' => Hash::make('123456'),
                'employee_name' => 'Anandito',
                'nik' => '123412341234',
                'photo' => '',
                'gender' => 'perempuan',
                'address' => 'Sukabirus',
                'phone' => '123456',
                'department' => 'qwe',
                'section' => 'Admin',
                'position' => 'Admin',
                'role' => 'Admin',
                'group' => 'Administrator',
                'domicile' => 'Surabaya'
            ]
        ];

        DB::table('users')->insert($Data);
    }
}
