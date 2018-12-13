<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Turma;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Turma::all();
        $posts = Post::orderBy('created_at','desc')->get();
        return view('home')
                ->with('cursos',$cursos)
                ->with('posts',$posts);
    }
    public function perfil()
    {
        $user = Auth::user();
        $role = Auth::user()->roles()->first()->name;
        return view('perfil')->with('dados',$user)
                             ->with('role',$role);
    }
    public function atualizaPerfil(Request $req,$id)
    {
        $user = User::findOrFail($id);
        $user->name = $req->nome;
        $user->matricula = $req->matricula;
        $user->save();
        return redirect('home')->with('status','Seu perfil foi atualizado com sucesso');
    }
    public function filtrarMensagens($filtro)
    {
        $posts = Post::where('cursos','=',$filtro)->get();
        $cursos = Turma::all();
        return view('home')
            ->with('cursos',$cursos)
            ->with('posts',$posts);
    }
    
}
