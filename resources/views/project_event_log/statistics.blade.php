@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    Самый активный пользователь {{$most_active_user[0]->user_id}}
                </div>
                <div class="card">
                    Самое частое событие для проекта {{$most_active_event[0]->event_type}}
                </div>
                <div class="card">
                    Страница, на которой события происходят чаще всего {{$most_viewed_page[0]->event_url}}
                </div>
                <div class="card">
                    <div class="card-header">Список дней недели с количеством событий на каждый день недели</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">День недели</th>
                                <th scope="col">Количество событий</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $dowMap = config('options.day_of_week');
                            @endphp
                            @foreach ($events_dw as $event)
                                <tr>
                                    <th scope="row">{{$dowMap[$event->day_of_week]}}</th>
                                    <td>{{$event->count}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Список страниц проекта с количеством событий на каждой</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Url страницы</th>
                                <th scope="col">Количество</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <th scope="row">{{$event->event_url}}</th>
                                    <td>{{$event->count}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

