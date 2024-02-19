<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_vendor' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'npwp_vendor' => $this->faker->unique()->regexify('[0-9]{15}'),
            'nama_vendor' => $this->faker->unique()->company(),
            'alamat_vendor' => $this->faker->address(),
            'init_date_supply' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'last_date_supply' => $this->faker->boolean(90) ? $this->faker->dateTimeBetween('-1 years', 'now') : null,
            'pic_vendor' => $this->faker->name(),
            'no_telp_vendor' => $this->faker->phoneNumber(),
            'no_telp_pic' => $this->faker->phoneNumber(),
            'status_blacklist' => $this->faker->boolean(90) ? true : false,
        ];
    }
}
