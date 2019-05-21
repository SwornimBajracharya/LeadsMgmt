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
    $table_data = array(
      'name' => 'Main Admin',
      'email' => 'admin@admin.com',
      'password' => bcrypt('password'),
      'user_type' => 'admin'
    );
    DB::table('users')->insert($table_data);
  }
}
