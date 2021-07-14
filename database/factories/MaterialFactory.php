<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8), true);
        $txt = $this->faker->realText(rand(1000, 4000));

            $data = [
                'category_id'   => rand(1, 11),
                'author'        => $this->faker->name,
                'type_id'       => rand(1, 6),
                'title'         => $title,
                'description'   => $txt,
            ];
        return $data;
    }
}
