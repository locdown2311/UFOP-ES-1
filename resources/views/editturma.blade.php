@extends('layouts.app')
@section('title','Edição de Turmas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulário de Edição de Turmas
                </div>
                <div class="card-body">
                    <form action="{{route('atualizaturma', ['id'=>$professores['id']])}}" method="POST">
                        @method('PATCH')    
                        @csrf
                            
                        <div class="form-row">
                                <div class="form-group col-md-6 offset-md-3">
                                        <label for="nome">Nome Turma</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome da turma" name="nome" value="{{$professores['nome']}}">
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 offset-md-3">
                                    <label for="descricao">Professor da turma</label>
                                    <input type="text" readonly class="form-control" id="descricao" name="autor" value="{{$professores['autor']}}">
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6 offset-md-3">
                                        <label for="descricao">Descrição da turma</label>
                                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{$professores['descricao']}}">
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
