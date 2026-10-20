<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuts')->insert([
            ['nom_statut' => 'En attente', 'rembourser' => false],
            ['nom_statut' => 'Approuvé',   'rembourser' => true],
            ['nom_statut' => 'Refusé',     'rembourser' => false],
        ]);
    }
}
