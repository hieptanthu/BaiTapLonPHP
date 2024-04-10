<?php
namespace Database\Factories;

use App\Models\orders;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ordersFactory extends Factory
{
    protected $model = orders::class;

    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'note' => $this->faker->text,
            'status' => $this->faker->randomElement([0, 1]),
            'total_money' => $this->faker->numberBetween(100, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
