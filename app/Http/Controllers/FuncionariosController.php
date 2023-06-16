<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Cidade;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FuncionariosController extends Controller
{
    public function index_funcionario()
    {
        $itensPaginas = 5; // número de itens por página
        $funcionarios = Funcionario::paginate($itensPaginas);

        $cidades = Cidade::all();
        $cidadesUnicas = $cidades->unique('nome');
        
        $cargos  = Cargo::all(); 
        $cargosUnicos = $cargos->unique('nome');

        return view('base.funcionarios', ['funcionarios' => $funcionarios, 'cidadesUnicas' => $cidadesUnicas, 'cargosUnicos' => $cargosUnicos]);
    }

    public function deletar_funcionario($id)
    {       
        $funcionario = Funcionario::find($id);

        if ($funcionario) {
            $funcionario->delete();
            return view('base.funcionarios')->with('success', 'Registro excluído com sucesso!');
        } else {
            return view('base.funcionarios')->with('error', 'Registro não encontrado.');
        }
    }

    public function atualizar_funcionario($id, Request $request)
    {
        $funcionario = new funcionario;
        $funcionario->updateFuncionario($id, $request->nome, $request->email, $request->cpf, $request->cidade_id, $request->cargo_id);
        return redirect('/funcionarios')->with('success', 'Registro atualizado com sucesso!');;
               
    }

    public function criar_funcionario(Request $request)
    {    
        $funcionario = Funcionario::create([
            'nome'      => $request->nome,
            'email'     => $request->email,
            'cpf'       => $request->cpf,
            'cidade_id' => $request->cidade_id,
            'cargo_id'  => $request->cargo_id,
        ]);

        return redirect('/funcionarios')->with('success', 'Registro criado com sucesso!');        
      
    }
}
