<?php

use App\Category;
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
            [
                'name' => 'jam Tangan',
                'slug' => 'jam-tangan'
            ],
            [
                'name' => 'G-shock',
                'slug' => 'g-shock'
            ],
            [
                'name' => 'skmei',
                'slug' => 'skmei'
            ],
            [
                'name' => 'Jam Pria',
                'slug' => 'jam-pria'
            ],
            [
                'name' => 'Jam wanita',
                'slug' => 'jam-wanita'
            ],
        ];
        Category::insert($categories);
    }
}
