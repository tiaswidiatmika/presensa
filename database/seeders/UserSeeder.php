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
        $users = [
            [
                'username' => 'tiaswidiatmika',
                'empnip' => '199105082017121001',
                'empname' => 'I+PUTU+TIAS+WIDIATMIKA',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'danyfadilah',
                'empnip' => '199003312017121001',
                'empname' => 'DANY+FADILAH+RAMDHANY',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'nara',
                'empnip' => '199508022017121001',
                'empname' => 'DEWA+GEDE+AGUS+NARAYANA',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'yudharizki',
                'empnip' => '199406202017121001',
                'empname' => 'YUDHA+RIZKI+PUTRA',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'eunikecahya',
                'empnip' => '199505022017122003',
                'empname' => 'EUNIKE CAHYA UTAMININGTYAS',
                'password' => '07081943',
            ],
            [
                'username' => 'emranumar',
                'empnip' => '198403182010121005',
                'empname' => 'EMRAN+UMAR+BIN+KABU+BURA',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'okawijaya',
                'empnip' => '199210212017121004',
                'empname' => 'I+Komang+Gede+Oka+Wijaya',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'aswin88',
                'empnip' => '199210212017121004',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'aswin88',
            ],
            [
                'username' => 'AdikP',
                'empnip' => '199210212017121004',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '12345A',
            ],
            [
                'username' => 'indrapratama',
                'empnip' => '199308072017121002',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'yohanesade',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'ruruhsumaryono',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'agusambara',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'endraputrayasa',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'eunikecahya',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '07081943',
            ],
            [
                'username' => 'Arifin',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '260491',
            ],
            [
                'username' => 'Josua',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'Jojonat28',
            ],
            // [
            //     'username' => 'oka',
            //     'empnip' => '199008042017121001',
            //     'empname' => 'user belum diubah nip dan nama',
            //     'password' => 'Maruti41',
            // ],
            [
                'username' => 'kevin03',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '12345678',
            ],
            [
                'username' => 'Farendra',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '123456',
            ],
            [
                'username' => 'gadipramana',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '010292',
            ],
            [
                'username' => 'gustigaluh',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],
            [
                'username' => 'andrafaiz',
                'empnip' => '199008042017121001',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'groupcharlie',
            ],

        ];

        $userBravo = [
            [
                'username' => 'Adhitama',
                'empnip' => 'nip acak',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '1234adhitama',
            ],
            [
                'username' => 'BayuBumi',
                'empnip' => 'nip acak',
                'empname' => 'user belum diubah nip dan nama',
                'password' => '1234bayu',
            ],
            [
                'username' => 'omferry',
                'empnip' => 'nip kosong',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'omferry',
            ],
            [
                'username' => 'Andhika125',
                'empnip' => 'nip kosong',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'Dwiastuti8',
            ],
            [
                'username' => 'Dwibima',
                'empnip' => 'nip kosong',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'bimbim25',
            ],
            [
                'username' => 'Triadnyana',
                'empnip' => 'nip kosong',
                'empname' => 'user belum diubah nip dan nama',
                'password' => 'tri1234',
            ],
        ];
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
