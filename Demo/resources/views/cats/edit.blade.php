@extends('layouts.app')
@section('header')
<h2>Edit cat</h2>
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
    <form action="{{ route('cats.update', $cat->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('partials.forms.cat')
        <button type="submit"> Update</button>
    </form>
@stop