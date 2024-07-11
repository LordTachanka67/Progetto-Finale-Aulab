<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Salute e bellezza',
        'Casa e giardinaggio',
        'Giocattoli',
        'Sport',
        'Animali domestici',
        'Libri e riviste',
        'Accessori',
        'Motori'
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

