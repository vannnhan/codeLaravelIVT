@extends('layouts.app')
@section('header')
<h2>Add a new cat</h2>
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
    <form action="{{ route('cats.store') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('partials.forms.cat')
        <button type="submit"> Create</button>
    </form>
@stop