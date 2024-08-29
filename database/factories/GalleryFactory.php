<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\id_ID\Person as FakerPerson;
use Faker\Provider\Internet as FakerInternet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Gallery::class;
    public function definition(): array
    {
        $this->faker->addProvider(new FakerPerson($this->faker));
        $this->faker->addProvider(new FakerInternet($this->faker));

        // Generate array of random image URLs
        $photos = [];
        for ($i = 0; $i < 10; $i++) { // Ganti 3 dengan jumlah foto yang diinginkan
            $photos[] = [
                'filename' => "1719676998.png"
            ];
        }

        return [
            'judul' => $this->faker->sentence, // Menggunakan sentence untuk judul
            'description' => $this->faker->paragraph,
            'foto' => json_encode($photos), // Konversi array ke format JSON
        ];
    }
}
