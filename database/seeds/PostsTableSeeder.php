<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
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
		    DB::table('Posts')->insert([
			    'author_id' => 1,
			    'category_id' => 1,
			    'published' => 1,
			    'title' => str_random(10),
			    'content' => '<p>' . str_random(10) . '</p>',
			    'created_at' => '2018-05-18 20:54:29',
			    'updated_at' => '2018-05-18 20:54:29',
		    ]);
	    }
    }
}
