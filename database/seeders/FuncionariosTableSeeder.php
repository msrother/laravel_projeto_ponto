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
         //   'cidade' =>'Passo Fundo',
         //   'cargo'  =>'Assistente administrativo',
        ]);
        
        $funcionario->create([
            'nome'   =>'Clodoaldo',
            'email'  =>'clodo@ewrs.com.br',
            'cpf'    =>'73698765835',
         //   'cidade' =>'Porto Alegre',
         //   'cargo'  =>'Auxiliar de serviços gerais',
        ]);

        $funcionario->create([
            'nome'   =>'Creuza',
            'email'  =>'creu@ewrs.com.br',
            'cpf'    =>'35698675300',
         //   'cidade' =>'Erechim',
         //   'cargo'  =>'Assistente de marketing',
        ]);

        $funcionario->create([
            'nome'   =>'Erikson',
            'email'  =>'erk@ewrs.com.br',
            'cpf'    =>'45696677300',
         //   'cidade' =>'Tapejara',
         //   'cargo'  =>'Supervisor',
        ]);

        $funcionario->create([
            'nome'   =>'Madeleine',
            'email'  =>'madline@ewrs.com.br',
            'cpf'    =>'22694475300',
         //   'cidade' =>'Passo Fundo',
         //   'cargo'  =>'Diretora',
        ]);
    }
}

