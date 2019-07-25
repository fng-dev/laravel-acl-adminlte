@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Usuarios</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Usuario</li>
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
                @canany(['delete_action', 'update_action'])
                <th>Ações</th>
                @endcan
            </thead>

            @foreach($users as $user)
                <thead>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <p>{{ ucfirst($role->name) }}</p>
                        @endforeach
                    </td>

                    <td>
                        @can('delete_action')
                        <a href="{{ route('painel.usuario.delete',['id' => $user->id]) }}">
                            <i class="fa fa-trash-o margin-r-5" aria-hidden="true"></i>
                        </a>
                        @endcan
                        @can('update_action')
                        <a href="{{ route('painel.usuario.update',['id' => $user->id]) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        @endcan

                    </td>
                </thead>
            @endforeach
        </table>

    </div>

</div>


@stop