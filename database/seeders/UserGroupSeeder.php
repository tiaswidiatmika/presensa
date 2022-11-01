<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'codename' => 'alpha',
                'first_day_of_year' => 1,
            ],
            [
                'codename' => 'bravo',
                'first_day_of_year' => 3,
            ],
            [
                'codename' => 'charlie',
                'first_day_of_year' => 7,
            ],
            [
                'codename' => 'delta',
                'first_day_of_year' => 5,
            ],
        ];

        if (Schema::hasTable('user_groups')) {
            foreach ($groups as $group) {
                DB::table('user_groups')
                    ->insert([
                        'codename' => $group['codename'],
                        'first_day_of_year' => $group['first_day_of_year'],
                    ]);
            }
        }

    }
}
