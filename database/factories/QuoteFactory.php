<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ship_from' => $this->faker->randomNumber(6, true),
            'deliver_to' => $this->faker->randomNumber(6, true),
            'transport' => $this->faker->randomElement([0, 1]),
        ];
    }
}
