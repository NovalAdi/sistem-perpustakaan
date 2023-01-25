<?php

namespace Database\Factories;

use App\Models\Anggota;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnggotaFactory extends Factory
{
    protected $model = Petugas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'telp' => $this->faker->phoneNumber(),
            'username' => $this->faker->userName(),
            'password' => $this->faker->password()
        ];
    }
}
