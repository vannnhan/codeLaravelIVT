@extends('layouts.app')
@section('content')
<h1>List Cat</h1>
<h2><a href="{{ route('cats.create') }}">Create cat</a></h2>

<table style="width:100%">
        <tr>
            <th>Name</th>
            <th>Birthday</th>
            <th>Breed_id</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    @foreach($cats as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->date_of_birth}}</td>
            <td>{{$item->breed_id}}</td>

            <td><a href="{{route('cats.edit', $item->id)}}">Edit</a></td>
            <td>
                <form onsubmit="return confirm('Are you sure you want to delete this post?')" action="{{ route('cats.destroy', $item->id) }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{ $cats->links() }}

    
@endsection