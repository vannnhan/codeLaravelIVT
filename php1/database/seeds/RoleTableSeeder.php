<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            ['name' => 'Quản trị viên'],
            ['name' => 'Nhân viên kinh doanh'],
            ['name' => 'Nhân viên hợp đồng'],
            ['name' => 'Nhân viên pháp lý'],
            ['name' => 'Nhân viên kế toán'],
         ]);
    }
}
