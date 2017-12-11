@extends('layouts.app')

@section('title')
    | Editar Tarefa
@stop

@section('content')


    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(count($errors->all()) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($task, ['route' => ['tasks.update', 'task'=>$task]]) !!}
    {{ method_field('PUT') }}
    @include('tasks.partials.form')
    <button type="submit" class="btn btn-warning">Salvar</button>
    {!! Form::close() !!}

@stop