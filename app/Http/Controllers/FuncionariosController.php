<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FuncionariosController extends Controller
{
    public function index()
    {
        // DESCRIÇÃO: Usado para listar todas as colunas da tabela users

        // $users = Colaboradores::all();
        // return view('base.colaboradores', ['users' => $users]);

        // DESCRIÇÃO: Usado para criar paginação na View Colaboradores.

        $itensPaginas = 6; // número de itens por página
        $users = Funcionario::paginate($itensPaginas);

        return view('base.funcionarios', ['users' => $users]);
    }

    public function deletar_funcionario($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
        $user = Funcionario::find($id);

        if ($user) {
            $user->delete();
            return view('base.funcionarios')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return view('base.funcionarios')->with('error', 'Usuário não encontrado.');
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

        $user = new funcionario;
        $user->updateUser($id, $request->name, $request->email);
        return redirect('/funcionarios');
        
        // SEM MODEL

        // $user = Colaboradores::find($id);
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();
        
        // return view('colaboradores')->with('success', 'Usuário Atualizado com sucesso!');

        // UPDATE COM JSON

        // $user = Colaboradores::find($id);
        // if (!$user) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Usuário não encontrado'
        //     ]);
        // }

        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Usuário atualizado com sucesso'
        // ]);
    }
}
