<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class UtilizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilizadores = Utilizador::all();

        return view('admin.layoutUtilizadores', ['utilizadores' => $utilizadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utilizador = new Utilizador();

        $utilizador->nome = $request->nome;
        $utilizador->telemovel = $request->telemovel;
        $utilizador->telefone = $request->telefone;
        $utilizador->email = $request->email;
        $utilizador->tipoUtilizador = $request->tipoUtilizador;
        $utilizador->departamento = $request->departamento;

        $utilizador->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilizador  $Utilizador
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilizador $utilizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilizador  $Utilizador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilizador $utilizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilizador  $Utilizador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilizador = posts::find($id);
        $utilizador->delete();
        return redirect('/');
    }

    public function realizarLogin()
    {
        if(isset($_SESSION["utilizador"])) {
            //Redirecionar para a respetiva página de utilizador
            if($user->tipoUtilizador == 0) {
                return redirect()->route('dashboardAdmin');
            }
            else {
                return redirect()->route("colaborador/pagInicial");
            } 
        }

        $nome = $_POST["nome"];
        $password = $_POST["password"];

        $user = self::getUserNome($nome);

        if($user != null) {
            if($user->password == $password) {
                $_SESSION["utilizador"] = $user;
                if($user->tipoUtilizador == 0) {
                    return redirect()->route('dashboardAdmin');
                }
                else {
                    return redirect()->route("colaborador/pagInicial");
                }   
            }
            else {
                return view("login")->with("msg", 'Não existe nenhuma conta com a combinação do nome de utilizador e password inseridos!');
            }
        }
        else {
            return view("login")->with("msg", 'Não existe nenhuma conta com a combinação do nome de utilizador e password inseridos!');
        }
    }
    public function realizarLogout()
    {
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        return redirect()->route('paginaLogin');
    }

    public function getUserId($id)
    {
        return ['user' => User::findOrFail($id)];
    }

    public function getUserNome($nome)
    {
        $user = DB::table('utilizador')->where('nome', $nome)->first();
        return $user;

    }
    
    public function notAllowed() {
        return view("login");
    }
}
