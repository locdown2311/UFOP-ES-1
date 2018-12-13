@extends('layouts.app')
@section('title','Inicio')
@section('content')
<div class="container">
    <div class="row row-eq-height">
        <div class="col-xs-7 col-sm-6 col-md-6 bg-ufop">
                <mensagem></mensagem>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-2"></div>
        <div class="col-xs-4 col-sm-5 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Então vamos criar sua conta</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 text-center">
                                <button class="btn btn-lg btn-success" disabled data-onsuccess="onSignIn">Login com Google (em testes)</button>
                        </div>
                            
                            <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nome">Nome completo</label>
                                        <input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        <small id="nameHelp" class="form-text text-muted">Que belo nome.</small>
                                        <label for="nome">Matrícula</label>
                                        <input name="matricula" type="text" class="form-control {{ $errors->has('matricula') ? ' is-invalid' : '' }}" value="{{ old('matricula') }}">
                                            @if ($errors->has('matricula'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('matricula') }}</strong>
                                                </span>
                                            @endif
                                        <small id="nameHelp" class="form-text text-muted">Pelo visto você estuda muito.</small>
                                      <label for="exampleInputEmail1">Email</label>
                                      <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                                      @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                      @endif
                                      <small id="emailHelp" class="form-text text-muted">Aqui o seu email é secreto.</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Sua senha</label>
                                      <input name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
                                      @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                      <small id="passHelp" class="form-text text-muted">Que bela senha...</small>

                                    </div>
                                    <div class="form-group">
                                            <label for="lProfissao">Escolha sua profissão</label>
                                            <select class="form-control" name="profissao">
                                                <option value="estudante">Estudante</option>
                                                <option value="professor">Professor</option>
                                            </select>
                                            <small id="ajudaProfissao" class="form-text text-muted">Tenha certeza da opção escolhida.</small>
                                    </div>
                                    
                                    <div class="form-row mb-0">
                                            <div>
                                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                                    <a class="btn btn-success" href="{{route('login')}}">Ja possui conta? Entre aqui</a>
                                            </div>
                                    </div>
                                    
                            </form>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
