<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'image' => "https://dummyimage.com/160x160/5c5c5c/fff",
      'title' => fake()->words(3, true),
      'description' => fake()->text(200),
      'is_available' => fake()->boolean(),
      'days_available' => fake()->randomDigitNotNull(),
      'observation' => fake()->text(80),
      'amount' => fake()->randomNumber(3, false)
    ];
  }
}
