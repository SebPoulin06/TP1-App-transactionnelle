<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'nom' => 'Chaussons Solution',
                'categorie' => 'Chaussons',
                'marque' => 'La Sportiva',
                'prix' => 189.99,
                'stock' => 15,
                'taille' => '38 à 45',
                'description' => 'Chaussons techniques pour le bloc et les voies difficiles.',
                'image' => 'chaussons-solution.jpg',
            ],
            [
                'nom' => 'Harnais Momentum',
                'categorie' => 'Harnais',
                'marque' => 'Black Diamond',
                'prix' => 89.99,
                'stock' => 20,
                'taille' => 'S à XL',
                'description' => 'Harnais ajustable pour l\'escalade intérieure et extérieure.',
                'image' => 'harnais-momentum.jpg',
            ],
            [
                'nom' => 'Assureur GRIGRI',
                'categorie' => 'Assurage',
                'marque' => 'Petzl',
                'prix' => 139.99,
                'stock' => 12,
                'taille' => 'Unique',
                'description' => 'Appareil d\'assurage avec assistance au freinage.',
                'image' => 'assureur-grigri.jpg',
            ],
            [
                'nom' => 'Magnésie Super Chalk',
                'categorie' => 'Magnésie',
                'marque' => 'Metolius',
                'prix' => 17.99,
                'stock' => 50,
                'taille' => '250 g',
                'description' => 'Magnésie en poudre pour améliorer l\'adhérence des mains.',
                'image' => 'magnesie-super-chalk.jpg',
            ],
            [
                'nom' => 'Sac à magnésie Boulder',
                'categorie' => 'Accessoires',
                'marque' => 'Organic Climbing',
                'prix' => 44.99,
                'stock' => 25,
                'taille' => 'Unique',
                'description' => 'Sac à magnésie conçu pour les séances de bloc.',
                'image' => 'sac-a-magnesie-boulder.jpg',
            ],
            [
                'nom' => 'Corde dynamique 9,4 mm',
                'categorie' => 'Cordes',
                'marque' => 'Black Diamond',
                'prix' => 249.99,
                'stock' => 10,
                'taille' => '60 m',
                'description' => 'Corde dynamique pour l\'escalade sportive.',
                'image' => 'corde-dynamique-9-4-mm.jpg',
            ],
            [
                'nom' => 'Mousqueton Spirit Express',
                'categorie' => 'Mousquetons',
                'marque' => 'Petzl',
                'prix' => 34.99,
                'stock' => 40,
                'taille' => '17 cm',
                'description' => 'Dégaine pour l\'escalade sportive.',
                'image' => 'mousqueton-spirit-express.jpg',
            ],
            [
                'nom' => 'Casque Half Dome',
                'categorie' => 'Protection',
                'marque' => 'Black Diamond',
                'prix' => 79.99,
                'stock' => 18,
                'taille' => 'S/M, M/L',
                'description' => 'Casque de protection pour l\'escalade extérieure.',
                'image' => 'casque-half-dome.jpg',
            ],
            [
                'nom' => 'Crash Pad Session II',
                'categorie' => 'Bloc',
                'marque' => 'Metolius',
                'prix' => 299.99,
                'stock' => 8,
                'taille' => 'Unique',
                'description' => 'Matelas de réception pliable pour le bloc extérieur.',
                'image' => 'crash-pad-session-ii.jpg',
            ],
            [
                'nom' => 'Ruban pour doigts',
                'categorie' => 'Accessoires',
                'marque' => 'Black Diamond',
                'prix' => 9.99,
                'stock' => 60,
                'taille' => 'Unique',
                'description' => 'Ruban adhésif pour soutenir et protéger les doigts.',
                'image' => 'ruban-pour-doigts.jpg',
            ],
            [
                'nom' => 'Poutre d\'entraînement',
                'categorie' => 'Entraînement',
                'marque' => 'Metolius',
                'prix' => 119.99,
                'stock' => 10,
                'taille' => 'Unique',
                'description' => 'Poutre pour développer la force des doigts.',
                'image' => 'poutre-d-entrainement.jpg',
            ],
            [
                'nom' => 'Brosse à prises',
                'categorie' => 'Accessoires',
                'marque' => 'Black Diamond',
                'prix' => 14.99,
                'stock' => 35,
                'taille' => 'Unique',
                'description' => 'Brosse pour retirer la magnésie des prises d\'escalade.',
                'image' => 'brosse-a-prises.jpg',
            ],
        ]);
    }
}
