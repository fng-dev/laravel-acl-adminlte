@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Nova Permissão</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Permissão</li>
        <li>Novo</li>
    </ol>
@stop

@section('content')

    <div class="box">

        <div class="box-header">

            @include('painel.includes.alerts')
        </div>

        <div class="box-body">
            <div class="col-md-6 col-md-offset-3">
                <form method="post" class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" placeholder="Nome da Role" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Label:</label>
                        <input type="text" name="label" id="label" placeholder="Label da Role" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    

@stop