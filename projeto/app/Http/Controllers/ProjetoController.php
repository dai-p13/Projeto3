<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use DB;
use Session;

class ProjetoController extends Controller
{
    public function index()
    {
        $user = session()->get("utilizador");
        $projetos = Projeto::all();
        if($user->tipoUtilizador == 0) {
            return view('admin/pagInicial', ['projetos' => $projetos]);
        }
        else {
            return view('colaborador/pagInicial', ['projetos' => $projetos]);
        }
    }

    public function store(Request $request)
    {
        $projeto = new Projeto();

        $projeto->nome = $request->nome;
        $projeto->objetivos = $request->objetivos;
        $projeto->regulamento = $request->regulamento;
        $projeto->publicoAlvo = $request->publicoAlvo;
        $projeto->observacoes = $request->observacoes;

        $projeto->save();
    }

    public function update(Request $request, projeto $projeto)
    {
        //
    }

    public function destroy($id)
    {
        $projeto = Projeto::find($id);
        if($projeto != null) {
            if($projeto->utilizadores()->first() != null) {
                $projeto->utilizadores()->where('id_projeto', $id)->delete();
            } 
            if($projeto->ilustradores()->first() != null) {
                $projeto->ilustradores()->where('id_projeto', $id)->delete();
            }
            if($projeto->juris()->first() != null) {
                $projeto->juris()->where('id_projeto', $id)->delete();
            }
            if($projeto->professores()->first() != null) {
                $projeto->professores()->where('id_projeto', $id)->delete();
            }
            if($projeto->professoresFacul()->first() != null) {
                $projeto->professoresFacul()->where('id_projeto', $id)->delete();
            }
            $projeto->delete();    
        }
        return redirect()->route("ilustradores");
    }

    public function getProjetoPorId($id)
    {
        $projeto = DB::table('projeto')
        ->where('id_projeto', $id)->first();
        if($projeto != null) {
            $objProjeto = new \stdClass();
            $objProjeto->id_projeto = $projeto->id_projeto;
            $objProjeto->nome = $projeto->nome;
            $objProjeto->objetivos = $projeto->objetivos;
            $objProjeto->publicoAlvo = $projeto->publicoAlvo;
            $objProjeto->observacoes = $projeto->observacoes;
            return response()->json(array('sucesso' => true, 'projeto' => $objProjeto));
        }
    }
    
    public function getNextPage() {

        $projetos = DB::table('projeto')->select('id_projeto','nome', 'objetivos',
        'publicoAlvo', 'observacoes')->simplePaginate(10);
        
        if($projetos != null) {
            return response()->json($projetos);
        }
        else {
            return null;
        }
        
    }

    public function getNumProjetos() {

        $projeto = Projeto::all();
        
        if($projeto != null) {
            return \count($projeto);
        }
        else {
            return 0;
        }
        
    }

    public function gerirParticipantes($id) {
        $projeto = Projeto::find($id);
        $anoAtual = \intval(date("Y"));
        $id_projeto = \intval($id);
        
        $entidades = null;
        $escolas = null;
        $ilustradores = null;
        $juris = null;
        $professores = null;
        $profsFacul = null;
        $rbes = null;
        $universidades = null;

        $entidades = self::getEntidadesDoProjeto($id_projeto, $anoAtual);
        $escolas = self::getEscolasDoProjeto($id_projeto, $anoAtual);
        $ilustradores = self::getIlustradoresDoProjeto($id_projeto, $anoAtual);
        $juris = self::getJurisDoProjeto($id_projeto, $anoAtual);
        $professores = self::getProfessoresDoProjeto($id_projeto, $anoAtual);
        $profsFacul = self::getProfessoresFacDoProjeto($id_projeto, $anoAtual);
        $rbes = self::getRbesDoProjeto($id_projeto, $anoAtual);
        $universidades = self::getUniversidadesDoProjeto($id_projeto, $anoAtual);

        $data = array(
            'entidades' => $entidades,
            'escolas' => $escolas,
            'ilustradores' => $ilustradores,
            'juris' => $juris,
            'professores' => $professores,
            'profsFac' => $profsFacul,
            'rbes' => $rbes,
            'universidades' =>$universidades
        );

        return view('admin/gerirParticipantesProjeto', ['title' => 'Projeto: '.$projeto->nome, 
                    'idProjeto' => $projeto->id_projeto, 'data' => $data]);
    }

    

    public function getEntidadesDoProjeto($id_projeto, $ano)
    {

        $entidades = DB::table('entidade_oficial')
                    ->join('projeto_entidade', 'entidade_oficial.id_entidadeOficial', '=', 'projeto_entidade.id_entidadeOficial')
                    ->select('entidade_oficial.id_entidadeOficial' , 'entidade_oficial.nome', 'entidade_oficial.telefone', 'entidade_oficial.telemovel', 'entidade_oficial.email', 'projeto_entidade.anoParticipacao')
                    ->where([
                        ['projeto_entidade.id_projeto', '=', $id_projeto],
                        ['projeto_entidade.anoParticipacao', '=', $ano],
                        ['entidade_oficial.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $entidades;
    }

    public function getEscolasDoProjeto($id_projeto, $ano)
    {

        $escolas = DB::table('escola_solidaria')
                    ->join('projeto_escola', 'escola_solidaria.id_escolaSolidaria', '=', 'projeto_escola.id_escolaSolidaria')
                    ->select('escola_solidaria.id_escolaSolidaria' , 'escola_solidaria.nome', 'escola_solidaria.telefone', 'escola_solidaria.telemovel', 'projeto_escola.anoParticipacao')
                    ->where([
                        ['projeto_escola.id_projeto', '=', $id_projeto],
                        ['projeto_escola.anoParticipacao', '=', $ano],
                        ['escola_solidaria.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $escolas;
    }

    public function getIlustradoresDoProjeto($id_projeto, $ano)
    {

        $ilustradores = DB::table('ilustrador_solidario')
                    ->join('projeto_ilustrador', 'ilustrador_solidario.id_ilustradorSolidario', '=', 'projeto_ilustrador.id_ilustradorSolidario')
                    ->select('ilustrador_solidario.id_ilustradorSolidario' , 'ilustrador_solidario.nome', 'ilustrador_solidario.telefone', 'ilustrador_solidario.telemovel', 'ilustrador_solidario.email', 'projeto_ilustrador.anoParticipacao')
                    ->where([
                        ['projeto_ilustrador.id_projeto', '=', $id_projeto],
                        ['projeto_ilustrador.anoParticipacao', '=', $ano],
                        ['ilustrador_solidario.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $ilustradores;
    }

    public function getJurisDoProjeto($id_projeto, $ano)
    {

        $juris = DB::table('juri')
                    ->join('projeto_juri', 'juri.id_juri', '=', 'projeto_juri.id_juri')
                    ->select('juri.id_juri' , 'juri.nome', 'juri.telefone', 'juri.telemovel', 'juri.email', 'projeto_juri.anoParticipacao')
                    ->where([
                        ['projeto_juri.id_projeto', '=', $id_projeto],
                        ['projeto_juri.anoParticipacao', '=', $ano],
                        ['juri.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $juris;
    }

    public function getProfessoresDoProjeto($id_projeto, $ano)
    {

        $professores = DB::table('professor')
                    ->join('projeto_professor', 'professor.id_professor', '=', 'projeto_professor.id_professor')
                    ->select('professor.id_professor' , 'professor.nome', 'professor.telefone', 'professor.telemovel', 'professor.email', 'projeto_professor.anoParticipacao')
                    ->where([
                        ['projeto_professor.id_projeto', '=', $id_projeto],
                        ['projeto_professor.anoParticipacao', '=', $ano],
                        ['professor.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $professores;
    }

    public function getProfessoresFacDoProjeto($id_projeto, $ano)
    {

        $profsFac = DB::table('professor_faculdade')
                    ->join('projeto_prof_faculdade', 'professor_faculdade.id_professorFaculdade', '=', 'projeto_prof_faculdade.id_professorFaculdade')
                    ->select('professor_faculdade.id_professorFaculdade' , 'professor_faculdade.nome', 'professor_faculdade.telefone', 'professor_faculdade.telemovel', 'professor_faculdade.email', 'projeto_prof_faculdade.anoParticipacao')
                    ->where([
                        ['projeto_prof_faculdade.id_projeto', '=', $id_projeto],
                        ['projeto_prof_faculdade.anoParticipacao', '=', $ano],
                        ['professor_faculdade.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $profsFac;
    }

    public function getRbesDoProjeto($id_projeto, $ano)
    {

        $rbes = DB::table('rbe')
                    ->join('projeto_rbe', 'rbe.id_rbe', '=', 'projeto_rbe.id_rbe')
                    ->select('rbe.id_rbe' , 'rbe.nomeCoordenador', 'rbe.regiao', 'projeto_rbe.anoParticipacao')
                    ->where([
                        ['projeto_rbe.id_projeto', '=', $id_projeto],
                        ['projeto_rbe.anoParticipacao', '=', $ano],
                        ['rbe.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $rbes;
    }

    public function getUniversidadesDoProjeto($id_projeto, $ano)
    {

        $rbes = DB::table('universidade')
                    ->join('projeto_universidade', 'universidade.id_universidade', '=', 'projeto_universidade.id_universidade')
                    ->select('universidade.id_universidade' , 'universidade.nome', 'universidade.telefone', 'universidade.telemovel', 'universidade.email', 'projeto_universidade.anoParticipacao')
                    ->where([
                        ['projeto_universidade.id_projeto', '=', $id_projeto],
                        ['projeto_universidade.anoParticipacao', '=', $ano],
                        ['universidade.disponivel', '=', 0]
                        ])
                    ->get();
        
        return $rbes;
    }
}