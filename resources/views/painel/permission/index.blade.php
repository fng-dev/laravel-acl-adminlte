@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Permissões</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Permissões</li>
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
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->label }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>


@stop