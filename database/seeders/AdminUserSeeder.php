<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mohammad Sayed Hossain',
            'email' => 'sayed.cse18@gmail.com',
            'password' => bcrypt('12345678'), 
            'role' => 'admin'
        ]);
    }
}
