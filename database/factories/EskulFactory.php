<?php

namespace Database\Factories;

use App\Models\Eskul;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\id_ID\Person as FakerPerson;
use Faker\Provider\Internet as FakerInternet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eskul>
 */
class EskulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Eskul::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->country,
            'description' => $this->faker->paragraph,
            'foto' => $this->faker->imageUrl(640, 480, 'country', true), // URL gambar acak
        ];
    }
}
