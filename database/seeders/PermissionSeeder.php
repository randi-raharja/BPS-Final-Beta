<?php

namespace Database\Seeders;

use App\constants\Permissions;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Permissions::all() as $name => $desc) {
            Permission::updateOrCreate(
                [
                    'name' => $name
                ],
                [
                    'desc' => $desc
                ]
            );
        }
    }
}
