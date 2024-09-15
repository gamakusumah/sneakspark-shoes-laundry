<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;
use App\Models\Kategori;
use App\Models\Layanan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Pegawai::create([
            'nama' => 'Kemal Ramadhan',
            'no_tlp' => '08986004677',
            'email' => 'km.kemal03@gmail.com',
            'password' => bcrypt('123456'),
            'alamat' => 'Jl. Jalan Jalan terus, Bandung, Jawa Barat',
            'role' => 'Admin',
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Pegawai::create([
            'nama' => 'Gama Kusumah',
            'no_tlp' => '08986004677',
            'email' => 'gama@gmail.com',
            'password' => bcrypt('123456'),
            'alamat' => 'Jl. Jalan Jalan terus, Bandung, Jawa Barat',
            'role' => 'Owner',
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Kategori::create([
            'nama' => 'Laundry Sepatu',
            'keterangan' => 'Perawatan profesional untuk sepatu bersih dan terawat.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Kategori::create([
            'nama' => 'Laundry Tas',
            'keterangan' => 'Cucian tas yang menjaga kualitas dan tampilan.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Layanan::create([
            'id_kategori' => 1,
            'image' => 'image-layanan/RuDonSG4vxvP0zK6eYQDzodpqs33v24J7LKg7KW3.jpg',
            'nama_layanan' => 'Hard Clean',
            'harga' => '50000',
            'deskripsi' => 'Hard Clean',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Layanan::create([
            'id_kategori' => 2,
            'image' => 'image-layanan/RuDonSG4vxvP0zK6eYQDzodpqs33v24J7LKg7KW3.jpg',
            'nama_layanan' => 'Easy Clean',
            'harga' => '50000',
            'deskripsi' => 'Easy Clean',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
