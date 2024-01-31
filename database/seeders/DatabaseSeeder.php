<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::create([
            'name' => 'Admin',
            'balance' => '0',
            'role' => 'Admin',
            'email' => 'admin@user.com',
            'password' => 'Admin',
        ]);

        User::create([
            'name' => 'Bank',
            'balance' => '0',
            'role' => 'Bank',
            'email' => 'bank@user.com',
            'password' => 'Bank',
        ]);

        User::create([
            'name' => 'Toko',
            'balance' => '0',
            'role' => 'Toko',
            'email' => 'toko@user.com',
            'password' => 'Toko',
        ]);

        User::create([
            'name' => 'Siswa',
            'balance' => '0',
            'role' => 'Siswa',
            'email' => 'siswa@user.com',
            'password' => 'Siswa',
        ]);

        Product::create([
            'name' => 'Pensil',
            'desc' => 'Untuk menulis',
            'price' => '3000',
            'first_stock' => '50',
            'last_stock' => '50',
        ]);

        Product::create([
            'name' => 'Buku tulis',
            'desc' => 'Untuk ditulis',
            'price' => '7000',
            'first_stock' => '40',
            'last_stock' => '40',
        ]);

        Product::create([
            'name' => 'Tempat pensil',
            'desc' => 'Untuk menyimpan',
            'price' => '15000',
            'first_stock' => '30',
            'last_stock' => '30',
        ]);

        Product::create([
            'name' => 'Penghapus',
            'desc' => 'Untuk menghapus',
            'price' => '1000',
            'first_stock' => '100',
            'last_stock' => '100',
        ]);
    }
}
