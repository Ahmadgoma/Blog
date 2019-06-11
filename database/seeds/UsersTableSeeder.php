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
      $user = new \App\Models\User();
      $user->email = 'admin@mumm.com';
      $user->name = 'Admin';
      $user->email_verified_at = now();
      $user->password = bcrypt('admin123');
      $user->save();
    }
}
