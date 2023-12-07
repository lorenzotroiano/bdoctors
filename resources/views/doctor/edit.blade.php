@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="row g-3 w-75 m-5 w-auto" method="POST" action="{{ route('doctor.update', $profile) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-md-6">
                <label for="photo" class="form-label">Inserisci Immagine</label>
                <input type="file" class="form-control @error('photo') error @enderror" name="photo" id="photo" value="{{ old('photo', $profile->photo) }}">
                @error('photo')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Inserisci Indirizzo</label>
                <input type="text" name="address" class="form-control @error('address') error @enderror" id="address" value="{{ old('address', $profile->address) }}">
                @error('address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Inserisci Descrizione</label>
                <textarea name="description" class="form-control @error('description') error @enderror" id="description"
                    placeholder="Inserisci descrizione" rows="3">{{old('description', $profile->description)}}</textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <label for="services" class="form-label">Servizi</label>
                <input type="text" name="services" class="form-control @error('services') error @enderror" id="services" placeholder="Inserisci servizi" value="{{ old('services', $profile->services) }}">
                    @error('services')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
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
                    id="typology-{{ $typology->id }}" 
                    @if ($errors->any())
                        @checked(in_array($typology->id, old('typologies',[])))
                    @else
                        @checked($profile->typologies->contains($typology->id))
                    @endif
                    >
                    <label class="form-check-label" for="typology-{{ $typology->id }}">
                        {{ $typology->name }}
                    </label>
                </div>
            </div>
            @endforeach
    
            <div class="col-12">
                <button type="submit" class="btn border border-2">Salva</button>
            </div>
        </form>
    </div>
@endsection