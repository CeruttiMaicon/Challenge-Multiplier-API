<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($id = 1; $id <= 10; $id++) {
            \App\Models\Product::create([
                'name' => 'Produto ' . $id,
                'value' => rand(5, 100),
                'category_id' => rand(1, 5)
            ]);
        }
    }
}
