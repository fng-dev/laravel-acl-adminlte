@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Role Usuario</h1>
    <ol class="breadcrumb">
        <li>Painel</li>
        <li>Role</li>
        <li>Permissões</li>
    </ol>
@stop

@section('content')

    <div class="box">

        <div class="box-header">
            @include('painel.includes.alerts')
        </div>

        <div class="box-body">
            <p>Role: {{ $role->name }}</p>
            <p>Label: {{ $role->label }}</p>
            <form method="post">
                @csrf
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                        <th>#</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                @if($role->permissions->contains('name', $permission->name))
                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}" checked>
                                @else
                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}">
                                @endif
                            </td>
                            <td>{{ $permission->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>

    </div>


@stop