<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             JenisOnderdilSeeder::class,
             RoleSeeder::class,
             UserSeeder::class,
             JenisKendaraanSeeder::class,
             KendaraanSeeder::class
         ]);
    }
}
