<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        
        DB::table('notes')->insert([
            'title' => 'This is a note',
            'text' => 'This is a sample note.',
            'user_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        
        DB::table('notes')->insert([
            'title' => 'This is a note',
            'text' => 'This is another sample note.',
            'user_id' => 2,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
