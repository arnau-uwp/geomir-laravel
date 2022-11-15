<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visibility::create(['id' => Visibility::public, 'name' => 'public']);
        Visibility::create(['id' => Visibility::contacts, 'name' => 'contacts']);
        Visibility::create(['id' => Visibility::private,  'name' => 'private']);
    }
}
