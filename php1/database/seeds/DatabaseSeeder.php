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
        $this->call(UserTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(CotypeTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ContractStatus::class);
    }
}
