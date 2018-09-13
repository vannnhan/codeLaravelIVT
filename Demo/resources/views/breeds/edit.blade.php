@extends('layouts.app')
@section('header')
<h2>Edit Breed</h2>
@stop
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('breed.update', $breed->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('partials.forms.breed')
        <button type="submit"> Update</button>
    </form>
@stop