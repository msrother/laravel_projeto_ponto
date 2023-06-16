<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $fillable = ['nome', 'departamento'];
        

    public function updateCargo($id, $nome, $departamento)
    {
        $cargo = cargo::find($id);
        $cargo->nome            = $nome;               
        $cargo->departamento    = $departamento;       
        $cargo->save();
    }
}
