<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // OPERATOR
            ['Darul Ulum',2], //1
            ['Naili Rohmah',2], //2

            // TEKNISI
            ['Santoso',3], //3
            ['Sutaji',3], //4

            // SUPIR GANDENG
            ['Hidan',4], //5
            ['Haryanto',4], //6
            ['Sayin',4], //7
            ['Suwono',4], //8
            ['Karsan',4], //9
            ['Basuni',4], //10
            ['Sholik',4], //11
            ['Warisan',4], //12
            ['Sakur',4], //13
            ['Didik',4], //14

            // SUPIR COLT DIESEL
            ['Purnomo',4], //15
            ['Sahri',4], //16
            ['Basori',4], //17
            ['Ghorib',4], //18
            ['Setiawan',4], //19
            ['Hadi',4], //20
            ['Tajib',4], //21
            ['Udin',4] //22
        ];
        $i = 0;
        foreach ($data as $user) {
            User::create([
                'nama' => $user[0],
                'username' => 'user'.$i,
                'role_id' => $user[1]
            ]);
            $i++;
        }
    }
}
