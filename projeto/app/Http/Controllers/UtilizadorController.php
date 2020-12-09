<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class UtilizadorController extends Controller
{
    
    public function index()
    {
        $utilizadores = Utilizador::all();

        return view('admin.utilizadores', ['utilizadores' => $utilizadores]);
    }

    public function store(Request $request)
    {
        $nomeUtilizador = $request->get("nomeUtilizador");
        $nome = $request->get("nome");
        $password = $request->get("password");
        $departamento = $request->get("departamento");
        $tipoUtilizador = \intval($request->get("tipoUtilizador"));
        $telefone = $request->get("telefone");
        $telemovel = $request->get("telemovel");
        $email = $request->get("email");

        $utilizador = self::getUserNome($nomeUtilizador);
        if($utilizador == null) {
            $user = new Utilizador();
            
            $user->nomeUtilizador = $nomeUtilizador;   
            $user->nome = $nome;  
            $user->password = $password;  
            $user->departamento = $departamento;  
            $user->tipoUtilizador = $tipoUtilizador;  
            $user->telefone = $telefone;  
            $user->telemovel = $telemovel;  
            $user->email = $email; 

            $user->save();
            return redirect()->route("utilizadores");
        }
    }

    public function update($id, Request $request)
    {
        $id_utilizador = \intval($id);
        $nomeUtilizador = $request->get("nomeUtilizador");
        $nome = $request->get("nome");
        $password = $request->get("password");
        $departamento = $request->get("departamento");
        $tipoUtilizador = \intval($request->get("tipoUtilizador"));
        $telefone = $request->get("telefone");
        $telemovel = $request->get("telemovel");
        $email = $request->get("email");
        
        $user = Utilizador::find($id_utilizador);
        if($user != null) {
            $user->nomeUtilizador = $nomeUtilizador;   
            $user->nome = $nome;  
            $user->password = $password;  
            $user->departamento = $departamento;  
            $user->tipoUtilizador = $tipoUtilizador;  
            $user->telefone = $telefone;  
            $user->telemovel = $telemovel;  
            $user->email = $email; 

            $user->save();
            return redirect()->route("utilizadores");
        }
    }

    public function destroy($id)
    {
        $utilizador = Utilizador::find($id);
        $utilizador->delete();
        return redirect()->route("utilizadores");
    }

    public function realizarLogin()
    {
        $user = session()->get('utilizador');
        if(isset($user)) {
            //Redirecionar para a respetiva página de utilizador
            if($user->tipoUtilizador == 0) {
                return redirect()->route('dashboardAdmin');
            }
            else {
                return redirect()->route("colaborador/pagInicial");
            } 
        }

        $nomeUtilizador = $_POST["nome"];
        $password = $_POST["password"];

        $user = self::getUserNome($nomeUtilizador);

        if($user != null) {
            if($user->password == $password) {
                session()->put("utilizador", $user);
                if($user->tipoUtilizador == 0) {
                    return redirect()->route('dashboardAdmin');
                }
                else {
                    return redirect()->route("colaborador/pagInicial");
                }   
            }
            else {
                return redirect()->route("paginaLoginErro", ['msg' => 'Não existe nenhuma conta com a combinação do nome de utilizador e password inseridos!']);
            }
        }
        else {
            return redirect()->route("paginaLoginErro",  ['msg' => 'Não existe nenhuma conta com a combinação do nome de utilizador e password inseridos!']);
        }
    }
    public function realizarLogout()
    {
        session()->flush();
        return redirect()->route('paginaLogin');
    }

    public function getUserId($id)
    {
        return ['user' => User::findOrFail($id)];
    }

    public function getUserNome($nomeUtilizador)
    {
        $user = DB::table('utilizador')->where('nomeUtilizador', $nomeUtilizador)->first();
        return $user;

    }

    public function getUserPorId($id) {
        
        $user = DB::table('utilizador')->where('id_utilizador', $id)->first();
        if($user != null) {
            return response()->json($user);  
        }
        else {
            return null;
        }
        
    }

    public function getNextPage() {

        $users = DB::table('utilizador')->simplePaginate(5);
        
        if($users != null) {
            return response()->json($users);
        }
        else {
            return null;
        }
        
    }

    public function getNumUsers() {

        $utilizadores = Utilizador::all();
        
        if($utilizadores != null) {
            return \count($utilizadores);
        }
        else {
            return 0;
        }
        
    }
}
