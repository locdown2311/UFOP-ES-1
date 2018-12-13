<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Role;
use App\Turma;
use Illuminate\Http\Request;

class TurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alocaAlunos()
    {
        $alunos = Role::with('users')->where('name','=','estudante')->get();
        $alunos = $alunos->toArray();

        $turmas = Turma::all();

        if(Auth::check()){
            if(Auth::user()->roles()->first()->name == ('professor' || 'administrador')){
                return view('alocacao')
                        ->with('alunos',$alunos)
                        ->with('turmas',$turmas);
            }else{
                return abort(403,'Acesso negado');
            }
        }
        return abort(403,'Acesso negado');  
    }
    public function desalocaAlunos()
    {
        $alunos = Role::with('users')->where('name','=','estudante')->get();
        $alunos = $alunos->toArray();

        $turmas = Turma::all();

        if(Auth::check()){
            if(Auth::user()->roles()->first()->name == ('professor' || 'administrador')){
                return view('desalocar')
                        ->with('alunos',$alunos)
                        ->with('turmas',$turmas);
            }else{
                return abort(403,'Acesso negado');
            }
        }
        return abort(403,'Acesso negado');  
    }
    public function postAloca(Request $req)
    {
        $turma = Turma::where('nome', $req->turma)->first();
        $user = User::where('name', $req->aluno)->first();
        $user->turmas()->attach($turma);
        return redirect('home')->with('status','Aluno alocado com sucesso');
    }
    public function index()
    {
        $turma = Turma::all();
        if(Auth::check()){
            if(Auth::user()->roles()->first()->name == ('professor' || 'administrador')){
                return view('visualizaturma')->with('professores',$turma);
            }else{
                return abort(403,'Acesso negado');
            }
        }
        return abort(403,'Acesso negado');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professores = Role::with('users')->where('name','=','professor')->get();
        $professores = $professores->toArray();
        if(Auth::check()){
            if(Auth::user()->roles()->first()->name == ('professor' || 'administrador')){
                return view('criaturma')->with('professores',$professores);
            }else{
                return abort(403,'Acesso negado');
            }
        }
        return abort(403,'Acesso negado');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Turma::create($data);
        return redirect('home')->with('status','Turma criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = Turma::findOrFail($id);
        if(Auth::check()){
            if(Auth::user()->roles()->first()->name == ('professor' || 'administrador')){
                return view('editturma')->with('professores',$turma);
            }else{
                return abort(403,'Acesso negado');
            }
        }
        return abort(403,'Acesso negado');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);
        $turma->nome = $request->nome;
        $turma->descricao = $request->descricao;
        $turma->autor = $request->autor;
        $turma->save();

        return redirect('home')->with('status','Turma atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
