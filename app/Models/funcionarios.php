<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model

{
    protected $table = 'users';

    public function updateUser($id, $name, $email)
    {
        $user = funcionarios::find($id);
        $user->name   = $name;
        $user->email  = $email;
        $user->cpf    = $cpf;
        $user->funcao = $funcao;       
        $user->cidade = $cidade;
        $user->save();
    }

}
?>