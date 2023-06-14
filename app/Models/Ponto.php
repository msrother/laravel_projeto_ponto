<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model

{
    protected $table = 'pontos';
    protected $fillable = ['funcionario_id', 'data', 'entrada', 'saida'];
        

    public function updatePonto($id, $funcionario_id, $data, $entrada, $saida)
    {
        $ponto = ponto::find($id);
        $ponto->funcionario_id  = $funcionario_id;               
        $ponto->data            = $data;               
        $ponto->entrada         = $entrada; 
        $ponto->saida           = $saida;      
        $ponto->save();
    }

    public function converterIdFuncionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');

        //após inserir isto, somente está funcionando o update do último registro cadastrado
    }

}
?>