@extends('layouts.app')

@section('content')
    <form action="{{ route('profile.doctor.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="delete-btn btn btn-danger m-1" type="submit"><i class="fa-solid fa-trash-can"></i></button>
    </form>
@endsection
