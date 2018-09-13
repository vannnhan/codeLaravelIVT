@extends('layouts.app')
@section('content')
<h1>List Breed</h1>
<h2><a href="{{ route('breed.create') }}">Create breed</a></h2>

<table style="width:100%">
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    @foreach($breeds as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{ route('breed.GetCatByBreedId',$item->id) }}">{{$item->name}}</a></td>

            <td><a href="{{ route('breed.edit', $item->id) }}">Edit</a></td>
            <td>
                <form onsubmit="return confirm('Are you sure you want to delete this post?')" action="{{ route('breed.destroy', $item->id) }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{-- {{ $breeds->links() }}
 --}}@endsection