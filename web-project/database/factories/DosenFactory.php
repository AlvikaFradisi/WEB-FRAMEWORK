<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->faker->unique()->numerify('################'),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telp' => $this->faker->phoneNumber(),
            'prodi' => $this->faker->randomElement(['Teknologi Informasi', 'Manajemen Informatika', 'Teknik Komputer', 'TRPL']),
            'alamat' => $this->faker->address(),
        ];
    }
}
