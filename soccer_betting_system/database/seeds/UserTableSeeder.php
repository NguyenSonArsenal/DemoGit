<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//DB::table('users')->delete(); // delete all records in colum

    	User::create([
    		'username' 	=> 'min',
    		'email' 	=> 'min@gmail.com',
    		'password' 	=> Hash::make('min123456'), // md5 password <=> Bcrypt 
    		'role_id'	=> '2'
    	]);

    }
}
