@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    Самое частое событие для проекта {{$most_active_event[0]->event_type}}
                </div>
            </div>
        </div>
    </div>
@endsection

