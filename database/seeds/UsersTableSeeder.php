<?php

use Illuminate\Database\Seeder;
use Foobooks\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #define users
        $users = [
        ['jill@harvard.edu', 'jill','helloworld'],
        ['jamal@harvard.edu',  'jamal', 'helloworld'],
        ['jmb464@g.harvard.edu', 'joachim', 'helloworld']
    ];


    #get existing users to prevent duplicates
    $existingUsers = User::all()->keyBy('email')->toArray();

    foreach($users as $user) {
    	#if the user does not already existe, add them
    	if(!array_key_exists($user[0], $existingUsers)) {
    		$user = User::create([
    			'email' => $user[0],
    			'name' => $user[1],
    			'password' => Hash::make($user[2]),

    			]);
    	}
    }

  }

}
