<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */


class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Ticket::class;
    public function definition(): array
    {
        return [
                   'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'event_id' => function () {
                return \App\Models\Event::factory()->create()->id;
            },
            'total_price' => $this->faker->randomNumber(5),
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'ticket_type_id' => function () {
                return \App\Models\TicketType::factory()->create()->id;
            },
            'transportion_id' => function () {
                return \App\Models\Transportation::factory()->create()->id;
            },
            'entertainment_id' => function () {
                return \App\Models\Entertainment::factory()->create()->id;
            },
            'airlines_counrty_id' => function () {
                return \App\Models\AirlineCountry::factory()->create()->id;
            },
            'shirt_size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];


    }
}
