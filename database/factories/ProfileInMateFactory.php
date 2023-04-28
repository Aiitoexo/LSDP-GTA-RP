<?php

namespace Database\Factories;

use App\Models\ProfileInMate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileInMate>
 */
class ProfileInMateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfileInMate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $minAge = 18;
        $maxAge = 65;
        $startDate = "-$maxAge years";
        $endDate = "-$minAge years";
        $birthday = $faker->dateTimeBetween($startDate, $endDate);

        return [
            'identity_number' => $faker->unique()->lexify('??????????'),
            'picture_url' => $faker->imageUrl(640, 480, 'animals'),
            'firstname' => $faker->unique()->firstName,
            'lastname' => $faker->unique()->lastName,
            'gender' => $faker->numberBetween(0, 1),
            'birthday' => $birthday->format('d/m/Y'),
            'age' => $faker->numberBetween($minAge, $maxAge),
            'address' => $faker->city,
        ];
    }
}
