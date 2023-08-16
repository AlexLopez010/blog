<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alejandro perez',
            'email'=> 'alex.1.perez@hotmail.com',
            'password' => bcrypt('12345')

        ]);
        User::factory(99)->create();
    }
}
