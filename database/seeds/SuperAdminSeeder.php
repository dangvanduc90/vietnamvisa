<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'super-admin',
            'status' => 1,
            'password' => bcrypt('1'),
        ]);
    }
}
