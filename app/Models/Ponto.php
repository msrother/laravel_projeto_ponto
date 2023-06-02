<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model

{
    protected $table = 'ponto';

    protected $fillable = ['data', 'entrada', 'saida'];
    
    

    public function updatePonto($id, $data, $entrada, $saida)
    {
        $ponto = ponto::find($id);
        $ponto->data   = $data;               
        $ponto->entrada     = $entrada; 
        $ponto->saida     = $saida;      
        $ponto->save();
    }

}
?>