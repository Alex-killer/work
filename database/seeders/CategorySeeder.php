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
        for ($i = 1; $i <=11; $i++) {
            $cName = 'Категория #' .$i;

            $categories[] = [
                'title'     => $cName,

            ];
        }

        \DB::table('categories')->insert($categories);
    }
}
