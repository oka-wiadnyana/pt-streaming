<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HakimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Hakim Ketua',
            'Hakim 1',
            'Hakim 2',
        ];

        foreach ($data as $d) {
            \App\Models\Hakim::create([
                'hakim_nama' => $d
            ]);
        }
    }
}
