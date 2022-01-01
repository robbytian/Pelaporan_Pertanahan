<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal_laporan' => '2021-12-30',
            'kegiatan' => 'koordinasi',
            'keterangan' => 'test Doang',
            'fieldstaff_id' => 1,
            'peserta' => 'siapa'
        ];
    }
}
