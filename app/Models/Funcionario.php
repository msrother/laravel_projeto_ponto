<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model

{
    protected $table = 'funcionarios';    
    protected $fillable = ['nome', 'email', 'cpf', 'cidade_id', 'cargo_id'];


    public function updateFuncionario($id, $nome, $email, $cpf, $cidade_id, $cargo_id)  
    {
        $funcionario = funcionario::find($id);
        $funcionario->nome      = $nome;
        $funcionario->email     = $email;
        $funcionario->cpf       = $cpf;              
        $funcionario->cidade_id = $cidade_id;
        $funcionario->cargo_id  = $cargo_id; 
        $funcionario->save();
    }

    public function converterIdCidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');

        //após inserir isto, somente está funcionando o update do último registro cadastrado
    }

    public function converterIdCargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');

        //após inserir isto, somente está funcionando o update do último registro cadastrado
    }

    public function exibirCargos()
    {
        $cargosUnicos = $funcionarios->unique('converterIdCargo.nome')->sortBy('converterIdCargo.nome');
    }

}
?>