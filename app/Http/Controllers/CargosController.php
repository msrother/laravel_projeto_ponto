<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CargosController extends Controller
{
    public function index_cargo()
    { 
        $itensPaginas = 5; // número de itens por página
        $cargos = Cargo::paginate($itensPaginas);

        return view('base.cargos', ['cargos' => $cargos]);
    }

    public function deletar_cargo($id)
    {        
        $cargo = Cargo::find($id);

        if ($cargo) {
            $cargo->delete();
            return view('base.cargos')->with('success', 'Registro excluído com sucesso!');
        } else {
            return view('base.cargos')->with('error', 'Registro não encontrado.');
        }
    }

    public function atualizar_cargo($id, Request $request)
    {        
        $cargo = new cargo;
        $cargo->updateCargo($id, $request->nome, $request->departamento);
        return redirect('/cargos')->with('success', 'Registro atualizado com sucesso!');        
       
    }    
    
    public function criar_cargo(Request $request)
    {          
        $cargo = Cargo::create([
            'nome' => $request->nome,
            'departamento' => $request->departamento,
        ]);

        return redirect('/cargos')->with('success', 'Registro criado com sucesso!');
      
    }
}
