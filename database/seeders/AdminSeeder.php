<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'like', 'Admin')->first();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bps.go.id',
            'email_verified_at' => now(),
            'password' => '$2y$10$w1PBjQMYBaatMZrcYFKkTuxozdHJUYnEFXfT.qfRjaUxTXzjY.TpO', // bpsbanjarmasin6371
            'alamat' => 'Jalan Gatot Subroto No. 5 Banjarmasin 70235',
            'no_hp' => '(0511) 6773031, 6773932',
            'wa' => '(0511) 6773031, 6773932',
            'role_id' => $role->id,
        ]);
    }
}
