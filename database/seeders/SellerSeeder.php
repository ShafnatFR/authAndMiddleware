<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::create([
            'name' => 'Seller User',
            'email' => 'seller@seller.com',
            'password' => bcrypt('password'),
        ]);

        Seller::factory(2)->create();
    }
}
