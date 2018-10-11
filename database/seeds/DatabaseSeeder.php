<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('groups')->truncate();
        DB::table('users')->truncate();
        for ($i = 1; $i <= 9; $i++) {
            DB::table('groups')->insert([
                'name' => "Groupe $i"
            ]);
            for ($j = 1; $j <= 9; $j++) {
                DB::table('users')->insert([
                    'name' => "User{$j}Groupe{$i}",
                    'email' => "User{$j}Groupe{$i}@local.dev",
                    'password' => bcrypt('0000'),
                    'group_id' => $i
                ]);
            }
        }
    }
}
