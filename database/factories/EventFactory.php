<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Event::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'pic' => $this->faker->name(),
            'description' => $this->faker->sentence(100),
            'terms' => $this->faker->sentence(100),
            'date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'fee' => $this->faker->randomFloat(2, 0, 1000),
            'location' => $this->faker->city(),
            'status' => 1,
            'image' => 'default',
            'slug' => $this->faker->slug(),
            'fee_description' => $this->faker->sentence(100),
        ];
    }
}
