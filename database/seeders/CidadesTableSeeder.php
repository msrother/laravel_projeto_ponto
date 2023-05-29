<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadesTableSeeder extends Seeder
{
    /**
     *  Para popular o banco, execute o comando: php artisan db:seed
     */
    public function run(Cidade $cidade)
    {
        $cidade->create([
            'nome'=>'Passo Fundo',
            'uf'  =>'RS',
        ]);
        
        $cidade->create([
            'nome'=>'Tapejara',
            'uf'  =>'RS',
        ]);

        $cidade->create([
            'nome'=>'Chapecó',
            'uf'  =>'SC',
        ]);

        $cidade->create([
            'nome'=>'Porto Alegre',
            'uf'  =>'RS',
        ]);

        $cidade->create([
            'nome'=>'Erechim',
            'uf'  =>'RS',
        ]);
    }
}

