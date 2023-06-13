<?php

namespace Database\Factories;

use App\Enums\CaraDatang;
use App\Enums\Gender;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SensusRawatInap>
 */
class SensusRawatInapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'gender' => collect(array_column(Gender::cases(), 'value'))->random(),
            'age' => $this->faker->randomNumber(2, true),
            'no_rm' => $this->faker->numerify('RM-####'),
            'cara_datang' => collect(array_column(CaraDatang::cases(), 'value'))->random(),
            'alamat' => $this->faker->address(),
            'diagnosa' => $this->faker->sentence(),
            'diagnosa_mrs' => $this->faker->sentence(),
            'diagnosa_krs' => $this->faker->sentence(),
            'tgl_mrs' => $this->faker->dateTime(),
            'tgl_krs' => $this->faker->dateTime(),
            'hp' => $this->faker->boolean(),
            'krs' => $this->faker->boolean(),
            'aps' => $this->faker->boolean(),
            'm' => $this->faker->boolean(),
            'rjk' => $this->faker->boolean(),
            'pdh' => $this->faker->boolean(),
            'cara_bayar' => $this->faker->sentence(),
            'dpjp' => $this->faker->name(),
        ];
    }
}
