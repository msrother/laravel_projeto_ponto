<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargosTableSeeder extends Seeder
{
    /**
     *  Para popular o banco, execute o comando: php artisan db:seed
     */
    public function run(Cargo $cargo)
    {
        $cargo->create([
            'nome'=>'Auxiliar',
            'departamento'  =>'Serviços Gerais',
        ]);
        $cargo->create([
            'nome'=>'Assistente',
            'departamento'  =>'Administrativo',
        ]);
        $cargo->create([
            'nome'=>'Montador',
            'departamento'  =>'Produção',
        ]);
    }
}

