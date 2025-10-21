<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objeto::create([

            'nombre' => 'Mesa',
            'tipo' => 'Mueble',
            'aula_id' => 'Informatica',

        ]);
        
    }
}
