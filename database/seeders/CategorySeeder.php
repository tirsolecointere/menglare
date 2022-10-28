<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            [
                'name' => 'Celulares y tables',
                'slug' => Str::slug('Celulares y Tables'),
                'icon' => '<i class="fas fas-mobile-alt"></i>',
            ],
            [
                'name' => 'TV, audio y video',
                'slug' => Str::slug('TV, audio y video'),
                'icon' => '<i class="fas fas-tv"></i>',
            ],
            [
                'name' => 'Consolas y videojuegos',
                'slug' => Str::slug('Consola y videojuegos'),
                'icon' => '<i class="fas fas-gamepad"></i>',
            ],
            [
                'name' => 'Computación',
                'slug' => Str::slug('Computación'),
                'icon' => '<i class="fas fas-laptop"></i>',
            ],
            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => '<i class="fas fas-tshirt"></i>',
            ],
        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
