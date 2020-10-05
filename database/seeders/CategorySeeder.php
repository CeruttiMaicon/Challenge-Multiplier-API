<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "Higiene",
            "Calçados",
            "Alimentação",
            "Limpeza",
            "Vestuario"
        ];

        foreach($categories as $category)
        {
            \App\Models\Category::create([
                'name' => $category,
            ]);
        }
    }
}
