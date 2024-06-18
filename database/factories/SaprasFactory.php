<?php

namespace Database\Factories;

use App\Models\Sapras;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\id_ID\Person as FakerPerson;
use Faker\Provider\Internet as FakerInternet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sapras>
 */
class SaprasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sapras::class;

    public function definition(): array
    {
        $this->faker->addProvider(new FakerPerson($this->faker));
        $this->faker->addProvider(new FakerInternet($this->faker));

        // Generate array of random image URLs
        $photos = [];
        for ($i = 0; $i < 3; $i++) { // Ganti 3 dengan jumlah foto yang diinginkan
            $photos[] = $this->faker->imageUrl(640, 480, 'people', true, 'Faker');
        }

        return [
            'name' => $this->faker->name,
            'total' => $this->faker->numberBetween($min = 1, $max = 100),
            'condition' => $this->faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat']),
            'foto' => json_encode($photos),
        ];
    }
}
