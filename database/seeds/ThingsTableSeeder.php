<?php

use Illuminate\Database\Seeder;

class ThingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('things')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'first_name'=> 'Billy',
        	'hair_color'=> 'brown',
        	'age'=> '80',
        	'fave_song' => 'rockin around the xmas tree',


        ]);//endfirstitem
        DB::table('things')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'first_name' => 'Johnny',
        	'hair_color' => 'black',
        	'age'=> '79',
        	'fave_song' => 'grease is the word',
        ]);//end2nditem
        DB::table('things')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'first_name' => 'Davey',
        	'hair_color' => 'brownish',
        	'age' => '47',
        	'fave_song' => 'umbrella',
        ]);
    }
}
