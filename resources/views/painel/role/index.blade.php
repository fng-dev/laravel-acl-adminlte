@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Roles</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Roles</li>

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
                <th>Label</th>
                <th>Ação</th>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->label }}</td>
                    <td>
                        @can('manager_action')
                            <a href="{{ route('painel.role.config.form',['id' => $role->id]) }}">
                                <i class="fa fa-pencil-square-o margin-r-5" aria-hidden="true"></i>
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>


@stop