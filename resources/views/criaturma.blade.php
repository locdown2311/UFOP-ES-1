@extends('layouts.app')
@section('title','Criação de Turmas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulário de Criação de Turmas
                </div>
                <div class="card-body">
                    <form action="/postTurma" method="POST">
                            @csrf
                        <div class="form-row">
                                <div class="form-group col-md-6 offset-md-3">
                                        <label for="nome">Nome Turma</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Nome da turma" name="nome">
                                </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6 offset-md-3">
                                                <label for="professor">Professor a ser vinculada</label>
                                                <select class="form-control " name="autor" id="professor">
                                                        @foreach ($professores[0]['users'] as $chave => $valor)
                                                                <option value="{{$valor['name']}}">{{$valor['name']}}</option>
                                                        @endforeach
                                                </select>
                                </div>
                                
                                
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6 offset-md-3">
                                        <label for="descricao">Descrição da turma</label>
                                        <input type="text" class="form-control" id="descricao" name="descricao">
                                </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-lg btn-danger">Salvar mudanças</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
