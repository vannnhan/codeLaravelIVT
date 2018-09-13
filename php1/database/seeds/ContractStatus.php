<?php

use Illuminate\Database\Seeder;

class ContractStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contract_status')->insert([
            ['name' => '<span class="label label-warning">Chưa xác nhận</span>'],
            ['name' => '<span class="label label-success">Xác nhận</span>'],
            ['name' => '<span class="label label-primary">Đang thực hiện</span>'],
            ['name' => '<span class="label label-success">Hoàn thành</span>'],
            ['name' => '<span class="label label-danger">Ngừng hợp đồng</span>'],
         ]);
    }
}
