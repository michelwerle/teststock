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
            App\Produit::insert(
                [[
                    'id' => 1,
                    'nom' => 'Coca-Cola',
                    'description' => 'Formidable canette rouge',
                    'prix' => 0.95,
                    'quantite' => 6
                ],
                [
                    'id' => 2,
                    'nom' => 'Xbox One X',
                    'description' => 'Console de jeu ultra-puissante',
                    'prix' => 399,
                    'quantite' => 2
                ]]
            );
            App\Mouvement::insert([
                [
                    'produit_id' => 1,
                    'created_at' => '2020-06-19 10:00:00',
                    'old' => '{"nom":"Coca-Cola","description":"Formidable canette rouge","prix":0.95,"quantite":6}',
                    'new' => '{"nom":"Coca-Cola","description":"Formidable canette rouge 2","prix":0.8,"quantite":9}'
                ],
                [
                    'produit_id' => 1,
                    'created_at' => '2020-06-20 15:00:00',
                    'old' => '{"prix":0.8,"quantite":9}',
                    'new' => '{"prix":1,"quantite":12}'
                ],
                [
                    'produit_id' => 1,
                    'created_at' => '2020-06-21 10:00:00',
                    'old' => '{"prix":1,"quantite":12}',
                    'new' => '{"prix":0.9,"quantite":10}'
                ],
                [
                    'produit_id' => 2,
                    'created_at' => '2020-06-19 10:00:00',
                    'old' => '{"prix":399,"quantite":2}',
                    'new' => '{"prix":299,"quantite":5}'
                ],
                [
                    'produit_id' => 2,
                    'created_at' => '2020-06-12 10:00:00',
                    'old' => '{"prix":299,"quantite":5}',
                    'new' => '{"prix":299,"quantite":4}'
                ]]
            );
    }
}
