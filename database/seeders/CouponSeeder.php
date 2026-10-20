<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->insert([
            [
                'code' => 'BIENVENUE10',
                'rabais_fix' => null,
                'rabais_pourcentage' => 10.00,
                'date_expiration' => '2026-12-31',
            ],
            [
                'code' => 'GRIMPE20',
                'rabais_fix' => 20,
                'rabais_pourcentage' => null,
                'date_expiration' => '2026-12-31',
            ],
            [
                'code' => 'EXPIRE5',
                'rabais_fix' => null,
                'rabais_pourcentage' => 5.00,
                'date_expiration' => '2026-01-01',
            ],
        ]);
    }
}
