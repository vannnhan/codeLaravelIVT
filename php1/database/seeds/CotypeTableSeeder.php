<?php

use Illuminate\Database\Seeder;

class CotypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cotype')->insert([
            ['cotype_name' => 'Chưa có nhu cầu'],
            ['cotype_name' => 'Quan tâm'],
            ['cotype_name' => 'Tiềm năng'],
            ['cotype_name' => 'Thân thiết'],
            ['cotype_name' => 'VIP'],
         ]);
    }
}
