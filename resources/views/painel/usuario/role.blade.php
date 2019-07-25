@extends('adminlte::page')

@section('title', 'Painel')

@section('content_header')
    <h1>Role Usuario</h1>
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
            <p>Nome: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <form method="post">
                @csrf
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                        <th>#</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                @if($user->roles->contains('name', $role->name))
                                    <input type="checkbox" name="role[]" value="{{ $role->id }}" checked>
                                @else
                                    <input type="checkbox" name="role[]" value="{{ $role->id }}">
                                @endif
                            </td>
                            <td>{{ $role->name }}</td>
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