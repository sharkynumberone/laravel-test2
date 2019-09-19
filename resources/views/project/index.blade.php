@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Список проектов</div>
                    <div class="card-body">
                        <div class="tools">
                            <form action="{{route('project.index')}}">
                                <i class="fa fa-edit"></i>
                                <a href="{{route('project.create.form')}}">
                                    Создать
                                </a>
                                <select name="sort_by">
                                    <option {{request()->get('sort_by') == 'id' ? 'selected' : ''}} value="id">ID</option>
                                    <option {{request()->get('sort_by') == 'name' ? 'selected' : ''}} value="name">Название</option>
                                    <option {{request()->get('sort_by') == 'url' ? 'selected' : ''}} value="url">URL</option>
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
                                <th scope="col">Наименование</th>
                                <th scope="col">URL-адрес сайта</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{$project->id}}</th>
                                <td>{{$project->name}}</td>
                                <td>{{$project->url}}</td>
                                <td>
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <a href="{{route('project.delete', $project->id)}}">
                                            Удалить
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            {{$projects->appends(['sort_by' => request()->get('sort_by')])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
