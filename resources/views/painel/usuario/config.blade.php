@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Config Usuario</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Usuario</li>
        <li>Configuração</li>
    </ol>
@stop

@section('content')

    <div class="box">

        <div class="box-header">
            @include('painel.includes.alerts')
        </div>

        <div class="box-body">

            <table class="table table-striped table-hover text-center">
                <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Role</th>

                </thead>

                @foreach($users as $user)
                <thead>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('painel.usuario.config.role.action', ['id' => $user->id]) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </thead>
                @endforeach
            </table>

        </div>

    </div>


@stop