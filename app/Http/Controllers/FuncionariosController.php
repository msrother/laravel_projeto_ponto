<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FuncionariosController extends Controller
{
    public function index_funcionario()
    {
        $itensPaginas = 5; // número de itens por página
        $funcionarios = Funcionario::paginate($itensPaginas);

        return view('base.funcionarios', ['funcionarios' => $funcionarios]);
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
        $funcionario->updateFuncionario($id, $request->nome, $request->email, $request->cpf, $request->cidade, $request->cargo);
        return redirect('/funcionarios')->with('success', 'Registro atualizado com sucesso!');;
               
    }

    public function criar_funcionario(Request $request)
    {    
        $funcionario = Funcionario::create([
            'nome'  => $request->nome,
            'email' => $request->email,
            'cpf'   => $request->cpf,
            'cidade'=> $request->cidade,
            'cargo' => $request->cargo,
        ]);

        return redirect('/funcionarios')->with('success', 'Registro criado com sucesso!');
      
    }
}
