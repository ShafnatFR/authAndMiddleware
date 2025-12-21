<?php

namespace Database\Seeders;

use App\Models\Buyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buyer::create([
            'name' => 'Buyer User',
            'email' => 'buyer@buyer.com',
            'password' => bcrypt('password'),
        ]);

        Buyer::factory(2)->create();
    }
}
