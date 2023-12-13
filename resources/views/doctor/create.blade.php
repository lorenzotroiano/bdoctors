@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row g-3 w-75 m-5 w-auto" method="POST" action="{{ route('doctor.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="col-md-6">
                <label for="photo" class="form-label">Inserisci Immagine</label>
                <input type="file" class="form-control" name="photo" id="photo">
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Inserisci Indirizzo</label>
                <input type="text" name="address" class="form-control" id="address" required>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Inserisci Descrizione</label>
                <input type="text" name="description" class="form-control" id="description"
                    placeholder="inserisci descrizione" required>
            </div>
            <div class="col-12">
                <label for="services" class="form-label">Servizi</label>
                <input type="text" name="services" class="form-control" id="services" placeholder="inserisci servizi"
                    required>
            </div>


            <div class="col-md-12">
                <label for="visible" class="form-label">Visibile</label>
                <select id="visible" name="visible" class="form-select">
                    <option selected>Visibile</option>
                    <option>0</option>
                    <option>1</option>
                </select>
            </div>

            @foreach ($typologies as $typology)
                <div class="col-3">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $typology->id }}" name="typologies[]"
                            id="typology-{{ $typology->id }}">
                        <label class="form-check-label" for="typology-{{ $typology->id }}">
                            {{ $typology->name }}
                        </label>
                    </div>

                </div>
            @endforeach



            <div class="col-12">
                <button type="submit" class="btn btn-primary">Crea profilo</button>
            </div>
        </form>
    </div>
@endsection
