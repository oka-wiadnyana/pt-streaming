<?php

namespace Database\Seeders;

use App\Models\KlasifikasiPerkara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasifikasiPerkaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'klasifikasi_text' => "Narkoba",
                'jenis_perkara' => "Pidana",
            ],
            [
                'klasifikasi_text' => "Pencurian",
                'jenis_perkara' => "Pidana",
            ],
            [
                'klasifikasi_text' => "Perbuatan Melawab Hukum",
                'jenis_perkara' => "Perdata",
            ],

            [
                'klasifikasi_text' => "Wanprestasi",
                'jenis_perkara' => "Perdata",
            ],
            [
                'klasifikasi_text' => "Korupsi",
                'jenis_perkara' => "Tipikor",
            ],

        ];

        KlasifikasiPerkara::insert($data);
    }
}
