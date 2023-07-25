<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Filiere;
use App\Models\OfficeAccount;
use App\Models\Option;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Filiere::factory(10)->create();
        Admin::factory()->create([
            'email' => 'errazy.abdelfatah@gmail.com',
            'password' => Hash::make('1234'),
            'photo'=>'admin/8.jpg',
            'first_name'=>'abdelfatah',
            'last_name'=>'errazy',
            'birthday'=>'16-08-1999',
            'phone_number'=>'0616081999',



        ]);
        Admin::factory()->create([
            'email' => 'asmae@a.com',
            'first_name'=>'asmae',
            'gender' => 'W',
            'last_name'=>'chakir',
            'birthday'=>'27-07-2001',
            'password' => Hash::make('1234'),
            'photo'=>'admin/300-6.jpg'
        ]);
        Admin::factory()->create([
            'email' => 'malak@a.com',
            'first_name'=>'malak',
            'last_name'=>'khatib',
            'gender' => 'W',
            'birthday'=>'16-08-1999',
            'password' => Hash::make('1234'),
            'photo'=>'admin/300-4.jpg'
        ]);
       
    }
}

