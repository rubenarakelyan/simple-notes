<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now('Europe/London')->format('Y-m-d H:i:s');
        
        DB::table('users')->insert([
            'name' => 'Henry Jones',
            'email' => 'henry.jones@example.com',
            'password' => bcrypt('myN@meIsHenry1988'),
            'created_at' => $date,
            'updated_at' => $date
        ]);
        
        DB::table('users')->insert([
            'name' => 'Sarah Smith',
            'email' => 'sarah.smith@example.com',
            'password' => bcrypt('myN@meIsSarah1988'),
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
