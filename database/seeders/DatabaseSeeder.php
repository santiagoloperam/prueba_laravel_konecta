<?php

namespace Database\Seeders;

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
    	$this->call(RoleSeeder::class);

         \App\Models\User::create([
         	'name' => 'Santiago Lopera',
            'email' => 'santiagoloperam@gmail.com',
         	'password' => bcrypt('123456789')
         ])->assignRole('Admin');

         \App\Models\User::factory(20)->create();
         \App\Models\Cliente::factory(20)->create();

         
    }
}
