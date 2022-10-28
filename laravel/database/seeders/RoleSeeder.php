<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
        ['id' => 1, 'name' => 'author'],
        ['id' => 2, 'name' => 'editor'],
        ['id' => 3, 'name' => 'admin'],
        ]);
    }
}
