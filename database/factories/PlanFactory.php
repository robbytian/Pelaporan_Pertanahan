<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'periode' => '2021-12-01',
            'lokasi' => 'Bandung',
            'tindak_lanjut' => 'memperbaiki',
            'fieldstaff_id' => 1
        ];
    }
}
