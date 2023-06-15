<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UsersController extends Controller
{
    public function index()
    {
        // DESCRIÇÃO: Usado para listar todas as colunas da tabela users

        // $users = Colaboradores::all();
        // return view('base.colaboradores', ['users' => $users]);

        // DESCRIÇÃO: Usado para criar paginação na View Colaboradores.

        $itensPaginas = 5; // número de itens por página
        $users = User::paginate($itensPaginas);

        return view('base.users', ['users' => $users]);
    }

    public function deletar_user($id)
    {
        // DESCRIÇÃO: Busca o ID do usuário para realizar a exclusão do registro
        // Quando encontrado, exclui o registro no banco de dados.
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return view('base.users')->with('success', 'Usuário excluído com sucesso!');
        } else {
            return view('base.users')->with('error', 'Usuário não encontrado.');
        }
    }

    public function atualizar_user($id, Request $request)
    {
        //A função updateUser é uma função que atualiza os dados do usuário no banco de dados. 
        //$user = new Colaboradores; cria um novo objeto da classe Colaboradores.
        //$user->updateUser($id, $request->name, $request->email); chama a função updateUser do objeto $user, 
        //passando os parâmetros $id, $request->name e $request->email. 
        //Essa função atualiza o nome e o email do usuário com o $id. 
        //return redirect('/colaboradores'); redireciona o usuário para a página /colaboradores.

        $user = new user;
        $user->updateUser($id, $request->name, $request->email);
        return redirect('/users')->with('success', 'Registro atualizado com sucesso!');
        
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

    public function criar_user(Request $request)
    {        
    
        // $user = User::create([
        //     'name'      => $request->nome,
        //     'email'     => $request->email,
        //     'password'  => $request->password,            
        // ]);

        $validar = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
             // 'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/']
            'password' => 'required|min:8',
        ], [
            'email.email' => 'O e-mail informado é inválido',
            'email.unique' => 'O e-mail informado já está em uso.',
            'password.required' => 'Por favor, informe a senha.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
              // 'regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.',
        ]);
        
        $validar['password'] = bcrypt($validar['password']);
        
        $user = User::create($validar);
        
        if ($user) {
            return redirect('/users')->with('success', 'Registro criado com sucesso!');
        } else {
            return redirect('/users')->with('error', 'Erro ao criar o registro.');
        }
        
    }    
}
