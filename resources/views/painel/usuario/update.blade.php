@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Editar Usuario</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Usuario</li>
        <li>Editar</li>
    </ol>
@stop

@section('content')

    <div class="box">

        <div class="box-header">

            @include('painel.includes.alerts')
        </div>

        <div class="box-body">
            <div class="col-md-6 col-md-offset-3">
                <form method="post" action="{{route('painel.usuario.update.action', [ 'id' => $user->id ])}}" class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" placeholder="Nome" value="{{ $user->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ $user->email }}" disabled="disabled"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    

@stop