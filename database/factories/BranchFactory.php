<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_branch' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'nama_branch' => $this->faker->unique()->city(),
            'alamat' => $this->faker->address(),
            'employee_id_pic_branch' => $this->faker->numberBetween(1, 3),
        ];
    }
}
