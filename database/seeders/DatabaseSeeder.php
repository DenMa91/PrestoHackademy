<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Auto','Sport', 'Lavoro','Abbigliamento','Fotografia','Telefonia','Tecnologia','Arredamento','Fai da te','Animali','Strumenti musicali','Immobiliare',
        ];
        foreach($categories as $category){
            
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
