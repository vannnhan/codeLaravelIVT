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
        $this->call(BreedsTableSeeder::class);
        $this->call(CatsTableSeeder::class);
        $this->call(UserProfileTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
