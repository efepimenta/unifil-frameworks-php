@extends('layouts.app')

@section('title')
    | Lista de Tarefas
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
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Acões</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$task->status}}"
                             aria-valuemin="0" aria-valuemax="100" style="width: {{$task->status}}%;">
                            <span class="sr-only">{{$task->status}}% Completa</span>
                        </div>
                    </div>
                </td>
                <td width="1%" nowrap>
                    <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-default">editar</a>
                    <a href="{{route('tasks.destroy', $task->id)}}" class="btn btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop