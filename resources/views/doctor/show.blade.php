@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="w-100 overflow-hidden">
                            <img src="{{asset("storage/{$profile->photo}")}}" class="img-profile object-cover rounded-start" alt="profile image of {{$user->name}} ">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-text mb-4"><span class="fw-semibold">{{$user->name}} {{$user->lastname}}</h5>
                            <p class="card-text"><span class="fw-semibold">Indirizzo: </span> {{$profile->address}}</p>
                            <p class="card-text"><span class="fw-semibold">Servizi: </span>
                                {{$profile->services}}
                            </p>
                            <p class="card-text">
                                <span class="fw-semibold">Visibilità: </span> {{$profile->visible ? 'Visibile' : 'Nascosto'}}
                            </p>
                            <div class="card-text">
                                <p class="fw-semibold">Email: <span class="fw-normal">{{$user->email}}</span></p> 
                            </div>
                            <div class="card-text">
                                <p class="fw-semibold">Voto: <span class="fw-normal">{{$media}}</span></p>
                            </div>
                            <div class="card-text">
                                <p class="fw-semibold">Indirizzo: <span class="fw-normal">{{$profile->address}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="infos">
                <div class="card-text">
                    <span class="fw-semibold">Descrizione:</span>
                    <p>{{$profile->description}}</p>
                </div>
                
            </div>
            <div class="buttons">
                <a href="{{route('doctor.edit', ['profile' => $profile])}}" class="btn border border-2 w-100">Modifica</a>
            </div>
        </div>
    </div>
</div>
@endsection