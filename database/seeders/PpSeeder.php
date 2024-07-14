<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'PP1',
            'PP2',
            'PP3',
        ];

        foreach ($data as $d) {
            \App\Models\PaniteraPengganti::create([
                'pp_nama' => $d
            ]);
        }
    }
}
