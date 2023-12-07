@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card mb-3 p-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{$user->image}}" class="img-fluid rounded-start" alt="profile image of {{$user->name}} ">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-text"><span class="fw-semibold">{{$user->name}} {{$user->lastname}}</h5>
                            <p class="card-text"><span class="fw-semibold">Email: </span> {{$user->email}}</p>
                            <p class="card-text"><span class="fw-semibold">Descrizione: </span> {{$profile->description}}</p>
                            <p class="card-text"><span class="fw-semibold">Servizi: </span>
                                {{$profile->services}}
                            </p>
                            <p class="card-text"><span class="fw-semibold">Indirizzo: </span> {{$profile->address}}</p>
                            <p class="card-text"><span class="fw-semibold">Indirizzo: </span> {{$profile->address}}</p>
                            <p class="card-text"><span class="fw-semibold">Indirizzo: </span> {{$profile->address}}</p>
                            <p class="card-text"><span class="fw-semibold">Visibilità: </span> {{$profile->visible ? 'Visibile' : 'Nascosto'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons d-flex justify-content-between">
                <a href="{{route('doctor.edit', ['profile' => $profile])}}" class="btn border border-2">Modifica</a>
                <a href="" class="btn btn-danger">Elimina</a>
            </div>
        </div>
    </div>
</div>
@endsection