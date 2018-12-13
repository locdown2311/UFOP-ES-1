@extends('layouts.app')
@section('title','Visualização de Turmas')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
          <div class="card">
              <div class="card-header">
                  Turmas presentes no sistema
              </div>
              <div class="card-body">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nome</th>
                          <th>Descrição</th>
                          <th>Autor</th>
                          <th colspan="2">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($professores as $turma)
                        <tr>
                          <td>{{$turma['id']}}</td>
                          <td>{{$turma['nome']}}</td>
                          <td>{{$turma['descricao']}}</td>
                          <td>{{$turma['autor']}}</td>
                          
                          <td><a href="{{route('editarturma', ['id'=>$turma['id']])}}" class="btn btn-warning">Editar</a></td>
                          <td>
                            <form action="{{route('deletaturma', ['id'=>$turma['id']])}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-danger" type="submit">Deletar</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
          </div>
      </div>
            
    </div>
</div>
@endsection