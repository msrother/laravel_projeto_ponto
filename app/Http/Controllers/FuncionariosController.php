<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FuncionariosController extends Controller
{
    public function index_funcionario()
    {
        // DESCRIÇÃO: Usado para listar todas as colunas da tabela users

        // $users = Colaboradores::all();
        // return view('base.colaboradores', ['users' => $users]);

        // DESCRIÇÃO: Usado para criar paginação na View Colaboradores.

        $itensPaginas = 5; // número de itens por página
        $funcionarios = Funcionario::paginate($itensPaginas);

        return view('base.funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function deletar_funcionario($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
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
        //A função updateUser é uma função que atualiza os dados do usuário no banco de dados. 
        //$user = new Colaboradores; cria um novo objeto da classe Colaboradores.
        //$user->updateUser($id, $request->name, $request->email); chama a função updateUser do objeto $user, 
        //passando os parâmetros $id, $request->name e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/colaboradores'); redireciona o usuário para a página /colaboradores.

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
