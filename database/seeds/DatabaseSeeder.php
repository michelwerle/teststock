<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
            App\User::create(
                [
                    'name' => 'Bob',
                    'email' => 'bob@bob.fr',
                    'password' => bcrypt('azerty'),
                ]
            );
            App\Produit::create(
                [
                    'nom' => 'Coca-Cola',
                    'description' => 'Formidable canette rouge',
                    'prix' => 0.95,
                    'quantite' => 6
                ],
                [
                    'nom' => 'Xbox One X',
                    'description' => 'Console de jeu ultra-puissante',
                    'prix' => 399,
                    'quantite' => 2
                ]
            );
    }
}
