<?php

use Illuminate\Database\Seeder;
use App\User;
class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('users')->insert([
        	'role' => 'superuser',
        	'username' => 'administrator',
        	'password' => bcrypt('admin123456')
        ]);
    }
}
