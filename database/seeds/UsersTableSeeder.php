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
          'name' => 'admin',
          'email' => 'testing@testing.com',
          'password' => Hash::make('admin'),
          'role_id' => '1',
      ]);
    }
}
