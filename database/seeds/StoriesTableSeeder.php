<?php

use Illuminate\Database\Seeder;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x=0;
        while ($x<50) {
            $x++;
            DB::table('stories')->insert([
                'user_id' => 1,
                'title' => 'Тестовая история ' . $x,
                'content' => '<p>контент контент контент контент контент контент контент контент контент контент контент контент контент контент контент</p>',
                'count_view' => rand(199,4999),
                'created_at' => '2018-05-18 20:54:29',
                'updated_at' => '2018-05-18 20:54:29'
            ]);
        }
    }
}
