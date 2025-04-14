<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\PaymentMethod;
use App\Models\RegistrationEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrationEvent>
 */
class RegistrationEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RegistrationEvent::class;
    public function definition(): array
    {
        $event = Event::inRandomOrder()->first();
        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->inRandomOrder()->first();
        $payment = PaymentMethod::inRandomOrder()->first();

        return [
            'event_id' => $event ? $event->id : null,
            'user_id' => $user ? $user->id : null,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'certificate_name' => $this->faker->name(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'telephone' => $this->faker->phoneNumber(),
            'phone_number' => $this->faker->phoneNumber(),
            'website' => $this->faker->url(),
            'instagram_facebook' => $this->faker->url(),
            'performance_type' => $this->faker->randomElement(['Solo', 'Duo', 'Trio', 'Quartet', 'Quintet', 'Sextet', 'Septet', 'Octet', 'Nonet', 'Decet']),
            'performance_title' => $this->faker->sentence(),
            'performance_minute' => $this->faker->sentence(),
            'music_type' => $this->faker->randomElement(['Jazz', 'Rock', 'Pop', 'Classical', 'Other']),
            'performance_number' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'pax_total' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'ticket_file' => null,
            'proof_of_payment' => null,
            'payment_method_id' => $payment ? $payment->id : null
        ];
    }
}
