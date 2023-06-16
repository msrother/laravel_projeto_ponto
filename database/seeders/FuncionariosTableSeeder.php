<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Funcionario;

class FuncionariosTableSeeder extends Seeder
{
    /**
     *  Para popular o banco, execute o comando: php artisan db:seed
     */
    public function run(Funcionario $funcionario)
    {
        $funcionario->create([
            'nome'   =>'Amadeo',
            'email'  =>'amd@ij.com',
            'cpf'    =>'01298765319',
            'cidade_id' =>'1',
            'cargo_id'  =>'2',
        ]);
        
        $funcionario->create([
            'nome'   =>'Clodoaldo',
            'email'  =>'clodo@ewrs.com.br',
            'cpf'    =>'73698765835',
            'cidade_id' =>'3',
            'cargo_id'  =>'1',
        ]);

        $funcionario->create([
            'nome'   =>'Creuza',
            'email'  =>'creu@ewrs.com.br',
            'cpf'    =>'35698675300',
            'cidade_id' =>'2',
            'cargo_id'  =>'3',
        ]);

        $funcionario->create([
            'nome'   =>'Erikson',
            'email'  =>'erk@ewrs.com.br',
            'cpf'    =>'45696677300',
            'cidade_id' =>'1',
            'cargo_id'  =>'2',
        ]);

        $funcionario->create([
            'nome'   =>'Madeleine',
            'email'  =>'madline@ewrs.com.br',
            'cpf'    =>'22694475300',
            'cidade_id' =>'3',
            'cargo_id'  =>'1',
        ]);
    }
}

