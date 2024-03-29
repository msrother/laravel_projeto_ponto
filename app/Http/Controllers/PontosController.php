<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PontosController extends Controller
{
    public function index_ponto()
    {       
        $itensPaginas = 5; // número de itens por página
        $pontos = Ponto::paginate($itensPaginas);

        $funcionarios = Funcionario::all();
        $funcionariosUnicos = $funcionarios->unique('nome');      

        return view('base.pontos', ['pontos' => $pontos, 'funcionariosUnicos' => $funcionariosUnicos]);
    }

    public function deletar_ponto($id)
    {        
        $ponto = Ponto::find($id);

        if ($ponto) {
            $ponto->delete();
            return view('base.pontos')->with('success', 'Registro excluído com sucesso!');
        } else {
            return view('base.pontos')->with('error', 'Registro não encontrado.');
        }
    }

    public function atualizar_ponto($id, Request $request)
    {
        $ponto = new ponto;
        $ponto->updatePonto($id, $request->funcionario_id, $request->data, $request->entrada, $request->saida);
        
        return redirect('/pontos')->with('success', 'Registro atualizado com sucesso!');
    }    
    
    public function criar_ponto(Request $request)
    {       
        $ponto = Ponto::create([
            'funcionario_id'    => $request->funcionario_id,
            'data'              => $request->data,
            'entrada'           => $request->entrada,
            'saida'             => $request->saida,
        ]);

        return redirect('/pontos')->with('success', 'Registro criado com sucesso!');
      
    }
}
