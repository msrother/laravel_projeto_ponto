<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model

{
    protected $table = 'cidades';

    public function updateCidade($id, $nome, $uf)
    {
        $cidade = cidade::find($id);
        $cidade->nome   = $nome;               
        $cidade->uf     = $uf;       
        $cidade->save();
    }

}
?>