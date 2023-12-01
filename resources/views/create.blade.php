@extends('layouts.app')

@section('content')
    <form class='' method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')


        <div>
            <input placeholder='Scegli immagine' id="photo" type="file" name="photo" autofocus>
        </div>

        <div>
            <input placeholder='Inserisci address' id="address" type="text" name="address" required>
        </div>

        <div>
            <input placeholder='Inserisci descrizione' id="description" type="text" name="description" required>
        </div>

        <div>
            <input placeholder='Inserisci servizi' id="services" type="text" name="services" required>
        </div>

        <div>
            <input placeholder='Inserisci visible' id="visible" type="text" name="visible" required>
        </div>


        {{-- <div>
            <select class="form-select" name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->nome }}
                    </option>
                @endforeach
            </select>
        </div> --}}


        {{-- <div>
            @foreach ($technologies as $technology)
                <div class="form-check mx-auto">
                    <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                        id="technology-{{ $technology->id }}">
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->nome }}
                    </label>
                </div>
            @endforeach
        </div> --}}

        <input class="lf--submit" type="submit" value="CREATE">
    </form>
@endsection
