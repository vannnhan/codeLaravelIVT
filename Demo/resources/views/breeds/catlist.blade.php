
@extends('layouts.app')
@section('content')
<h2>List cat by id = {{ $breed_id }}</a></h2>

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
                <form action="{{ route('cats.destroy', $item->id) }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@endsection