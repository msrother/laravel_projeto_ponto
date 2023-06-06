<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CidadesController extends Controller
{
    public function index_cidade()
    {
        // DESCRIÇÃO: Usado para listar todas as colunas da tabela users

        // $users = Colaboradores::all();
        // return view('base.colaboradores', ['users' => $users]);

        // DESCRIÇÃO: Usado para criar paginação na View Colaboradores.

        $itensPaginas = 5; // número de itens por página
        $cidades = Cidade::paginate($itensPaginas);

        return view('base.cidades', ['cidades' => $cidades]);
    }

    public function deletar_cidade($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
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
        //A função updateUser é uma função que atualiza os dados do usuário no banco de dados. 
        //$user = new Colaboradores; cria um novo objeto da classe Colaboradores.
        //$user->updateUser($id, $request->name, $request->email); chama a função updateUser do objeto $user, 
        //passando os parâmetros $id, $request->name e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/colaboradores'); redireciona o usuário para a página /colaboradores.

        $cidade = new cidade;
        $cidade->updateCidade($id, $request->nome, $request->uf);
        return redirect('/cidades')->with('success', 'Registro atualizado com sucesso!');
        
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

    }    
    
    public function criar_cidade(Request $request)
    {
            // $request->validate([
            //     'nome' => 'required',
            //     'uf' => 'required|max:2',
            // ]);
    
        $cidade = Cidade::create([
            'nome' => $request->nome,
            'uf' => $request->uf,
        ]);

        return redirect('/cidades')->with('success', 'Registro criado com sucesso!');
      
    }
}
