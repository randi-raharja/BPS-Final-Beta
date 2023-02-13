<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Fungsi;
use App\Models\Sumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fungsi Mitigasi
        Fungsi::create(['name' => 'Umum']);
        Fungsi::create(['name' => 'IPDS']);
        Fungsi::create(['name' => 'Nerwilis']);
        Fungsi::create(['name' => 'Distribusi']);
        Fungsi::create(['name' => 'Sosial']);
        Fungsi::create(['name' => 'Produksi']);

        // Category Laporan
        Category::create(['name' => 'Peraturan']);
        Category::create(['name' => 'Pelayanan Terpadu']);
        Category::create(['name' => 'Pegawai']);
        Category::create(['name' => 'Birokrasi']);
        Category::create(['name' => 'Fasilitas']);

        // Sumber Risk Mitigasi
        Sumber::create(['name' => 'Internal']);
        Sumber::create(['name' => 'BPS Pusat']);
        Sumber::create(['name' => 'Ekternal BPS']);
    }
}
