<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PontosController extends Controller
{
    public function index()
    {
        // DESCRIÇÃO: Usado para listar todas as colunas da tabela users

        // $users = Colaboradores::all();
        // return view('base.colaboradores', ['users' => $users]);

        // DESCRIÇÃO: Usado para criar paginação na View Colaboradores.

        $itensPaginas = 5; // número de itens por página
        $pontos = Ponto::paginate($itensPaginas);

        return view('base.pontos', ['pontos' => $pontos]);
    }

    public function deletar_ponto($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
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
        //A função updateUser é uma função que atualiza os dados do usuário no banco de dados. 
        //$user = new Colaboradores; cria um novo objeto da classe Colaboradores.
        //$user->updateUser($id, $request->name, $request->email); chama a função updateUser do objeto $user, 
        //passando os parâmetros $id, $request->name e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/colaboradores'); redireciona o usuário para a página /colaboradores.

        $ponto = new ponto;
        $ponto->updatePonto($id, $request->data, $request->entrada, $request->saida);
        return redirect('/pontos')->with('success', 'Registro atualizado com sucesso!');
        
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
    
    public function criar_ponto(Request $request)
    {
            // $request->validate([
            //     'nome' => 'required',
            //     'uf' => 'required|max:2',
            // ]);
    
        $ponto = Ponto::create([
            'data' => $request->data,
            'entrada' => $request->entrada,
            'saida' => $request->saida,
        ]);

        return redirect('/pontos')->with('success', 'Registro criado com sucesso!');
      
    }
}
