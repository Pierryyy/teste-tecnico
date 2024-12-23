<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportadoraSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1f0a1c69-3e02-4f40-a10e-1b8c80d5d7c6',
                'cnpj' => '1234567890001',
                'fantasia' => 'SWIFT CARGO'
            ],
            [
                'id' => 'b03aae7e-2014-4a1b-8fbf-589f7e42c39e',
                'cnpj' => '9876543210001',
                'fantasia' => 'BLUE ARROW LOGISTICS'
            ],
            [
                'id' => '7de173f7-6708-4c02-82a4-83ee1f6172e5',
                'cnpj' => '5678901230001',
                'fantasia' => 'EXPRESS WINGS'
            ],
            [
                'id' => 'f7b59a8e-d4ad-4cb3-b2f1-3dbcf20888f4',
                'cnpj' => '3456789010001',
                'fantasia' => 'GULLIVER EXPRESS'
            ],
            [
                'id' => '52f2e4b8-12a6-468e-b62f-3a38ee6d69e0',
                'cnpj' => '8901234560001',
                'fantasia' => 'GLOBAL TRANSPORTS'
            ],
            [
                'id' => '2c71e3b0-1291-4964-8d78-9e34c2299b45',
                'cnpj' => '2345678900001',
                'fantasia' => 'PHOENIX CARRIERS'
            ],
            [
                'id' => '0e99f223-5763-4876-9b9f-6031c8d8f76f',
                'cnpj' => '6789012340001',
                'fantasia' => 'CARGOXPRESS'
            ],
            [
                'id' => 'c7dc509e-30b4-43a8-b0aa-f42df94495a3',
                'cnpj' => '4567890120001',
                'fantasia' => 'TRANSNET SOLUTIONS'
            ],
            [
                'id' => '48b1707e-3e92-4e8e-a0c1-c49ba09836d2',
                'cnpj' => '9012345670001',
                'fantasia' => 'RAPID CARGO'
            ],
            [
                'id' => 'ff1e258e-89e0-4c78-b3c5-48bae8c0546b',
                'cnpj' => '1230987650001',
                'fantasia' => 'AEROLOGIX'
            ]
        ];

        // Usando Eloquent para inserção
        foreach ($data as $item) {
            \App\Models\Transportadora::create($item);
        }
    }
}
