@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Логи</div>
                    <div class="card-body">
                        <div class="tools">
                            <a href="{{route('project_event_log.index')}}?sort_by=id&sort_direction=asc">Сортировать по Id</a>
                            <a href="{{route('project_event_log.index')}}?sort_by=project_id&sort_direction=asc">Сортировать по проекту</a>
                            <a href="{{route('project_event_log.index')}}?sort_by=user_id&sort_direction=asc">Сортировать по пользователю</a>
                        </div>
                        <div class="tools">
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Проект</th>
                                <th scope="col">Пользователь</th>
                                <td>Тип события</td>
                                <td>Страница на которой произошло событие</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($project_event_logs as $log)
                                <tr>
                                    <th scope="row">{{$log['id']}}</th>
                                    <td>{{$log['project']['name']}}</td>
                                    <td>{{$log['user_id']}}</td>
                                    <td>{{$log['event_type']}}</td>
                                    <td>{{$log['event_url']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$project_event_logs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
