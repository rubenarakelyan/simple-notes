<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_yesterday = Carbon::now('Europe/London')->subDays(1)->hour(23)->minute(13)->second(0)->format('Y-m-d H:i:s');
        $date_today = Carbon::now('Europe/London')->hour(9)->minute(45)->second(0)->format('Y-m-d H:i:s');
        
        DB::table('comments')->insert([
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue lacus, efficitur quis pellentesque id, accumsan et tortor. Etiam a fermentum tortor. Morbi eget lectus et felis porta elementum?',
            'note_id' => 1,
            'user_id' => 2,
            'created_at' => '2015-07-28 15:24',
            'updated_at' => '2015-07-28 15:24'
        ]);
        
        DB::table('comments')->insert([
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue lacus, efficitur quis pellentesque id, accumsan et tortor. Etiam a fermentum tortor. Morbi eget lectus et felis porta elementum?',
            'note_id' => 1,
            'user_id' => 1,
            'created_at' => $date_yesterday,
            'updated_at' => $date_yesterday
        ]);
        
        DB::table('comments')->insert([
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue lacus, efficitur quis pellentesque id, accumsan et tortor. Etiam a fermentum tortor. Morbi eget lectus et felis porta elementum?',
            'note_id' => 1,
            'user_id' => 2,
            'created_at' => $date_today,
            'updated_at' => $date_today
        ]);
    }
}
