@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                    <div class="card-header">
                            <div class="alert alert-success">
                                    {{ session('status') }}
                            </div>
                    </div>
                @endif
                <div class="card-body">
                <form action="/postAviso" method="POST">
                    @csrf
                   <input type="hidden" name="profissao" value="{{\Auth::user()->roles()->first()->name}}">
                   <input type="hidden" name="autor" value="{{\Auth::user()->name}}">
                   <input type="hidden" name="categoria" value="aviso">
                    <div class="form-group">
                        <label for="comment">Deixe aqui seu aviso:</label>
                        <textarea style="resize: none;" class="form-control" required rows="4" cols="10" name="texto"></textarea>
                        <div class="mt-2 mb-0 row row-eq-height">
                                <div class="col-md-3">
                                    @if (\Auth::user()->roles()->first()->name == 'professor')
                                        <span class="badge badge-warning">
                                            Professor
                                        </span>
                                    @elseif(\Auth::user()->roles()->first()->name == 'administrador')
                                        <span class="badge badge-danger">
                                            Administrador
                                        </span>
                                    @else
                                        <span class="badge badge-success">
                                            Estudante
                                        </span>
                                    @endif
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                     <button class="btn px-2 py-1 btn-outline-success" type="submit">Postar</button>
                                        
                                </div>
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <div>
                                            <span class="badge badge-info">Categoria</span> 
                                    </div>
                                    <select class="form-control">
                                            <option value="avisos">Avisos</option>
                                            <option disabled value="">Anúncios</option>
                                    </select>   
                                        
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <span class="badge badge-success">Turmas</span> 
                                    </div>
                                    <select class="form-control" name="cursos">
                                            @foreach ($cursos as $id => $value)
                                                <option value="{{ $value->nome }}">{{ $value->nome }}</option>
                                            @endforeach
                                    </select>                             
                                </div>
                        </div>
                      </div>
                   </form>
                </div>
            </div>
            <hr>
            <div class="card mt-2 mb-2 border-dark">
                <div class="card-body">
                    <p class="text-center">Recados anteriores abaixo</p>
                </div>
            </div>
            <hr>
            @foreach ($posts as $id =>$value)
            <div class="card mt-2 mb-2">
                <div class="card-body">
                    <textarea style="resize: none;" class="form-control" readonly cols="10" name="texto">{{$value->texto}}</textarea>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($value->profissao == 'professor')
                                <span class="badge badge-warning">
                                    {{$value->profissao}}
                                </span>
                            @elseif($value->profissao == 'administrador')
                                <span class="badge badge-danger">
                                        {{$value->profissao}}
                                </span>
                            @else
                                <span class="badge badge-success">
                                    {{$value->profissao}}
                                </span>
                            @endif
                                
                        </div>
                        <div class="col-md-3">
                            Turma : {{$value->cursos}}
                        </div>
                        <div class="col-md-5">
                            Autor : {{$value->autor}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                                @if (\Auth::user()->roles()->first()->name == 'administrador')
                                <form action="{{route('deletapost', ['id'=>$value->id])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                                  </form>
                            @elseif(\Auth::user()->name == $value->autor)
                                <form action="{{route('deletapost', ['id'=>$value->id])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                                  </form>
                            @else
                                  
                            @endif
                        </div>
                        
                    </div>
                        
                </div>
                
            </div>
            @endforeach
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                            <a class="list-group-item list-group-item-text">Filtragem de cursos</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-primary">EC</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">EP</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-success">SI</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">EE</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
