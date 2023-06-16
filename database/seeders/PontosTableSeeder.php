<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ponto;

class PontosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Ponto $ponto)
    {
        $ponto->create([
            'funcionario_id'=>'3',
            'data'          =>'2023/06/13',
            'entrada'       =>'7:42',
            'saida'         =>'17:31',            
        ]);
        
        $ponto->create([
            'funcionario_id'=>'2',
            'data'          =>'2023/06/13',
            'entrada'       =>'7:47',
            'saida'         =>'17:16',            
        ]);

        $ponto->create([
            'funcionario_id'=>'1',
            'data'          =>'2023/06/12',
            'entrada'       =>'7:52',
            'saida'         =>'17:00',            
        ]);

        $ponto->create([
            'funcionario_id'=>'4',
            'data'          =>'2023/06/14',
            'entrada'       =>'8:02',
            'saida'         =>'18:00',            
        ]);

        $ponto->create([
            'funcionario_id'=>'5',
            'data'          =>'2023/06/15',
            'entrada'       =>'7:45',
            'saida'         =>'17:21',            
        ]);
    }
}
