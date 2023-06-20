<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CidadesController extends Controller
{
    public function index_cidade()
    {       
        $itensPaginas = 5; // número de itens por página
        $cidades = Cidade::paginate($itensPaginas);

        return view('base.cidades', ['cidades' => $cidades]);
    }

    public function deletar_cidade($id)
    {       
        $cidade = Cidade::find($id);

        if ($cidade) {
            $cidade->delete();
            return view('base.cidades')->with('success', 'Registro excluído com sucesso!');
        } else {
            return view('base.cidades')->with('error', 'Registro não encontrado.');
        }
    }

    public function atualizar_cidade($id, Request $request)
    {

        $cidade = new cidade;
        $cidade->updateCidade($id, $request->nome, $request->uf);
        return redirect('/cidades')->with('success', 'Registro atualizado com sucesso!');        
     
    }    
    
    public function criar_cidade(Request $request)
    {
     
        $cidade = Cidade::create([
            'nome' => $request->nome,
            'uf' => $request->uf,
        ]);

        return redirect('/cidades')->with('success', 'Registro criado com sucesso!');
      
    }
}
