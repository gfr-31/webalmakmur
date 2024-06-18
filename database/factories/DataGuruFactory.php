<?php

namespace Database\Factories;

use App\Models\DataGuru;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\id_ID\Person as FakerPerson;
use Faker\Provider\Internet as FakerInternet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataGuru>
 */
class DataGuruFactory extends Factory
{
    protected $model = DataGuru::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new FakerPerson($this->faker));
        $this->faker->addProvider(new FakerInternet($this->faker));

        return [
            'name' => $this->faker->name,
            'jk' => $this->faker->randomElement(['L', 'P']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'jabatan' => $this->faker->jobTitle,
            'foto' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
