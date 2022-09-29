<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $hash=Hash::make('password');
        DB::table('users')->insert([
            ['name' => "admin",'email'=>'admin@admin.com','password'=>''.$hash.'']
            ]);
    }
}
