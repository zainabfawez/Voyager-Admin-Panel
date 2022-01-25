<?php

namespace Database\Factories;

use App\Models\MyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MyCategoryFactory extends Factory
{   
    protected $model = MyCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
