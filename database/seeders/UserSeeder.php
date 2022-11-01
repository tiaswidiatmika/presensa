<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'username' => 'tiaswidiatmika',
            'empnip' => '199105082017121001',
            'empname' => 'I+PUTU+TIAS+WIDIATMIKA',
            'password' => 'groupcharlie',
        ]];
        if (Schema::hasTable('users')) {
            foreach ($users as $user) {
                DB::table('users')
                    ->insert([
                        'username' => $user['username'],
                        'empnip' => $user['empnip'],
                        'empname' => $user['empname'],
                        'password' => $user['password'],
                        'user_groups_id' => 3,
                    ]);
            }
        }
    }
}
