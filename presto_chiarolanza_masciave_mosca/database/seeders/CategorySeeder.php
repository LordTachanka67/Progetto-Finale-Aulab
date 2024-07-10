<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public $categories = [
        'elettronica',
        'abbigliamento',
        'salute e bellezza',
        'casa e giardinaggio',
        'giocattoli',
        'sport',
        'animali domestici',
        'libri e riviste',
        'accessori',
        'motori'
    ];
    

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
    // LANCIARE I SEEDER
    // php artisan db:seed CategorySeeder
}

