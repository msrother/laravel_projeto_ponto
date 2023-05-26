<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model

{
    protected $table = 'funcionarios';
    
    protected $fillable = ['nome', 'uf'];

    public function updateFuncionario($id, $nome, $email, $cpf, $cidade, $cargo)
    {
        $funcionario = funcionario::find($id);
        $funcionario->nome   = $name;
        $funcionario->email  = $email;
        $funcionario->cpf    = $cpf;              
        $funcionario->cidade = $cidade;
        $funcionario->cargo  = $cargo; 
        $funcionario->save();
    }

}
?>