<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'email'      => $this->faker->unique()->safeEmail,
            'olx_url'    => 'https://www.olx.ua/d/obyavlenie/' . $this->faker->word . '-' . $this->faker->uuid . '.html',
            'last_price' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
