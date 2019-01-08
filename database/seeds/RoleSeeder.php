<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=['owner','operator','teknisi','supir'];
        foreach($data as $nama){
            Role::create([
                'nama' => $nama
            ]);
        }
    }
}
