<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Category-1'],
            ['id' => 2, 'name' => 'Category-2'],
        ];
        foreach ($categories as $c) {
            Category::query()->firstOrCreate(['id' => $c['id']], ['name' => $c['name']]);
        }
    }
}
