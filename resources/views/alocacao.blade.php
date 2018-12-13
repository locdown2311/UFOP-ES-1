@extends('layouts.app')
@section('title','Alocação de Turmas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulário de Alocação de Alunos
                </div>
                <div class="card-body">
                <form action="/alocaEst" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="aluno">Aluno a ser vinculado</label>
                                <select class="form-control" id="aluno" name="aluno">
                                    @foreach ($alunos[0]['users'] as $chave => $valor)
                                         <option value="{{$valor['name']}}">{{$valor['name']}}</option>
                                    @endforeach
                                </select>
                              </div>

                              <div class="form-group">
                                    <label for="turma">Turma a ser vinculada</label>
                                    <select class="form-control" id="turma" name="turma">
                                        @foreach ($turmas as $chave => $valor)
                                            <option value="{{$valor['nome']}}">{{$valor['nome']}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                <label class="form-check-label" for="defaultCheck1">
                                    Confirmar decisão
                                </label>
                            </div> 
                            <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-success">Alocar aluno</button>
                            </div>
                            
                                
   
                      
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
