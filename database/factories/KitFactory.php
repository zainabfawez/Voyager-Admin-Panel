<?php

namespace Database\Factories;

  
use App\Models\Kit;
use Illuminate\Database\Eloquent\Factories\Factory;

class KitFactory extends Factory
{   
    protected $model = kit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'user_id'=>$this->faker->unique()->numberBetween(1,25),
        ];
    }
}
