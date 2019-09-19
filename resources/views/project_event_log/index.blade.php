@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Логи</div>
                    <div class="card-body">
                        <div class="tools">
                            <form action="{{route('project_event_log.index')}}">
                                <select name="sort_by">
                                    <option {{request()->get('sort_by') == 'id' ? 'selected' : ''}} value="id">ID</option>
                                    <option {{request()->get('sort_by') == 'project_id' ? 'selected' : ''}} value="project_id">Проект</option>
                                    <option {{request()->get('sort_by') == 'user_id' ? 'selected' : ''}} value="user_id">Id пользователя</option>
                                </select>
                                <button type="submit">Сортировать</button>
                            </form>
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
                                    <th scope="row">{{$log->id}}</th>
                                    <td>{{$log->project->name}}</td>
                                    <td>{{$log->user_id}}</td>
                                    <td>{{$log->event_type}}</td>
                                    <td>{{$log->event_url}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$project_event_logs->appends(['sort_by' => request()->get('sort_by')])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
