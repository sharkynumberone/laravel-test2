@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    Самый активный пользователь {{$most_active_user[0]->user_id}}
                </div>
            </div>
        </div>
    </div>
@endsection

