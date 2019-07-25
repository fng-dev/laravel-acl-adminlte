@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="box">

        <div class="box-body">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">


                    @if(count(auth()->user()->roles))
                        @foreach(auth()->user()->roles as $role)

                            <b>{{ucfirst($role->name)}} </b></h5>

                        @endforeach

                        <h5>Email: {{ auth()->user()->email }}</h5>
                        <h5>Permissões</h5>

                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead>
                            @foreach($permissions as $permission)
                                <th>{{ $permission->name }}</th>
                            @endforeach
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <td>@can($permission->name) <b>X</b> @endcan</td>
                            @endforeach
                            </tbody>

                        </table>


                    @else
                        Nenhuma função atribuida ainda!</h4>
                    @endif
                </div>
            </div>

        </div>
    </div>

@stop