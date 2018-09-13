<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
        	'name' => 'Phạm Viết Nghĩa',
            'email' =>'nghia.pham@vanlienhoa.com',
            'user' =>'admin',
            'role' =>'1',
            'avatar' =>'avatar.png',
        	'password' => bcrypt('vietnghia91')
        ]);
    }
}
