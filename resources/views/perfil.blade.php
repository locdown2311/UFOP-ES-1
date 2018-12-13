@extends('layouts.app')
@section('title','Editar perfil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    Formulário de Edição de Perfil
                </div>
                <div class="card-body">
                        <form action="{{route('atualizaP', ['id'=>\Auth::user()])}}" method="POST">
                            @method('PATCH')
                            @csrf
                                <div class="form-row">
                                  <div class="form-group col-md-3">
                                    <label for="matricula">Matrícula</label>
                                  <input type="text" class="form-control" id="matricula" name="matricula" value="{{ (old('matricula')) ? old('matricula') : $dados->matricula }}">
                                  </div>
                                  <div class="col-md-6"></div>
                                  <div class="form-group col-md-3">
                                        <label for="acesso">Nível de Acesso</label>
                                  <input type="text" class="form-control" id="acesso" value="{{$role}}" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="nome">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="{{ (old('nome')) ? old('nome') : $dados->name }}">
                                        </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="confirma" required>
                                    <label class="form-check-label" for="confirma">
                                      Confirmar alterações
                                    </label>
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
