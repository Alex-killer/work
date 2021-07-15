<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Material;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        Material::factory()->count(15)->create();
        Link::factory()->count(20)->create();
    }
}
