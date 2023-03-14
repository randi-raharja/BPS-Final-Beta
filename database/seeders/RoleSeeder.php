<?php

namespace Database\Seeders;

use App\Models\Role;
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
        Role::updateOrCreate(['name' => 'pelapor'], ['desc' => 'pelapor']);

        Role::updateOrCreate(
            ['name' => 'Admin'],
            ['desc' => 'Super Admin'],
        );
    }
}
