<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'root',
          'email' => 'root'.'@locksek.com',
          'password' => bcrypt('root'),
          'roleId' => '3',
          'email_verified_at' => now(),
          'created_at' => now(),
          'updated_at' => now(),
      ]);
    }
}
