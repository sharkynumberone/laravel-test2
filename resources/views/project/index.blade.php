@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список проектов</div>
                    <div class="card-body">
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <a href="{{route('project.create.form')}}">
                                Создать
                            </a>
                            <a href="{{route('project.index')}}?sort_by=id&sort_direction=asc">Сортировать по Id</a>
                            <a href="{{route('project.index')}}?sort_by=name&sort_direction=asc">Сортировать по наименованию</a>
                            <a href="{{route('project.index')}}?sort_by=url&sort_direction=asc">Сортировать по url</a>
                        </div>
                        <div class="tools">
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">URL-адрес сайта</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{$project['id']}}</th>
                                <td>{{$project['name']}}</td>
                                <td>{{$project['url']}}</td>
                                <td>
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <a href="{{route('project.delete', $project['id'])}}">
                                            Удалить
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            {{$projects->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
