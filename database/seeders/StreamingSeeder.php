<?php

namespace Database\Seeders;

use App\Models\Streaming;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $dataSeed = [
            [
                'nomor_perkara' => '201/Pdt/2024/PT DPS',
                'nomor_perkara_pertama' => '11/Pdt.G/2024/PN Nga',
                'jenis_perkara' => 'Perdata',
                'tanggal_sidang' => '2024-05-01',
                'link_streaming' => 'https://www.youtube.com/watch?v=bQMesIXWtNw',
                'amar_putusan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laborum ipsam ipsum non est minus atque sequi quidem molestiae adipisci, asperiores error. Quam veniam rerum necessitatibus vero officia culpa ipsam natus perferendis asperiores? Quam, tempora excepturi corrupti assumenda, quibusdam doloremque obcaecati saepe consectetur itaque illo corporis in exercitationem adipisci dolores earum debitis! Reprehenderit cumque fuga illum, veniam aspernatur iusto error beatae, quos placeat minima odit praesentium numquam officiis quidem sit dignissimos voluptatibus! Eveniet, doloremque numquam velit, id ab nesciunt qui pariatur itaque temporibus molestiae culpa illum sit quas nam veritatis ratione iure! Sint veritatis voluptates animi nesciunt! Adipisci, quisquam quod?',
                'doc_putusan' => '/putusan'
            ],
            [
                'nomor_perkara' => '111/Pdt/2024/PT DPS',
                'nomor_perkara_pertama' => '112/Pdt.G/2024/PN Nga',
                'jenis_perkara' => 'Perdata',
                'tanggal_sidang' => '2024-06-01',
                'link_streaming' => 'https://www.youtube.com/watch?v=bQMesIXWtNw',
                'amar_putusan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laborum ipsam ipsum non est minus atque sequi quidem molestiae adipisci, asperiores error. Quam veniam rerum necessitatibus vero officia culpa ipsam natus perferendis asperiores? Quam, tempora excepturi corrupti assumenda, quibusdam doloremque obcaecati saepe consectetur itaque illo corporis in exercitationem adipisci dolores earum debitis! Reprehenderit cumque fuga illum, veniam aspernatur iusto error beatae, quos placeat minima odit praesentium numquam Adipisci, quisquam quod?',
                'doc_putusan' => '/putusan'
            ],
            [
                'nomor_perkara' => '12/Pid/2024/PT DPS',
                'nomor_perkara_pertama' => '14/Pid.B/2024/PN Nga',
                'jenis_perkara' => 'Pidana',
                'tanggal_sidang' => '2024-06-05',
                'link_streaming' => 'https://www.youtube.com/watch?v=bQMesIXWtNw',
                'amar_putusan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laborum ipsam ipsum non est minus atque sequi quidem molestiae adipisci, asperiores error. Quam veniam rerum necessitatibus vero officia culpa ipsam natus perferendis asperiores? Quam, tempora excepturi corrupti assumenda, quibusdam doloremque obcaecati saepe consectetur itaque illo corporis in exercitationem adipisci dolores earum debitis! Reprehenderit cumque fuga illum, veniam aspernatur iusto error beatae, quos placeat minima odit praesentium numquam Adipisci, quisquam quod? fdafdaea fdafas',
                'doc_putusan' => '/putusan'
            ],
            [
                'nomor_perkara' => '18/Pid/2024/PT DPS',
                'nomor_perkara_pertama' => '25/Pid.B/2024/PN Nga',
                'jenis_perkara' => 'Pidana',
                'tanggal_sidang' => '2024-07-05',
                'link_streaming' => 'https://www.youtube.com/watch?v=bQMesIXWtNw',
                'amar_putusan' => ' csaad casca Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laborum ipsam ipsum non est minus atque sequi quidem molestiae adipisci, asperiores error. Quam veniam rerum necessitatibus vero officia culpa ipsam natus perferendis asperiores? Quam, tempora excepturi corrupti assumenda, quibusdam doloremque obcaecati saepe consectetur itaque illo corporis in exercitationem adipisci dolores earum debitis! Reprehenderit cumque fuga illum, veniam aspernatur iusto error beatae, quos placeat minima odit praesentium numquam Adipisci, quisquam quod? fdafdaea fdafas',
                'doc_putusan' => '/putusan'
            ],
            [
                'nomor_perkara' => '18/Pid/2024/PT DPS',
                'nomor_perkara_pertama' => '56/Pid.B/2024/PN Nga',
                'jenis_perkara' => 'Pidana',
                'tanggal_sidang' => '2024-07-05',
                'link_streaming' => 'https://www.youtube.com/embed/v=bQMesIXWtNw',
                'amar_putusan' => ' csaad casca Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laborum ipsam ipsum non est minus atque sequi quidem molestiae adipisci, asperiores error. Quam veniam rerum necessitatibus vero officia culpa ipsam natus perferendis asperiores? Quam, tempora excepturi corrupti assumenda, quibusdam doloremque obcaecati saepe consectetur itaque illo corporis in exercitationem adipisci dolores earum debitis! Reprehenderit cumque fuga illum, veniam aspernatur iusto error beatae, quos placeat minima odit praesentium numquam Adipisci, quisquam quod? fdafdaea fdafas',
                'doc_putusan' => ''
            ]
        ];


        foreach ($dataSeed as $data) {
            Streaming::create($data);
        }
        // DB::table('streamings')->truncate();
    }
}
