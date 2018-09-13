@extends('layouts.master')
@section('content')
<h1>List Cat</h1>
<h2><a href="/cats/create">Create cat</a></h2>

<table style="width:100%">
        <tr>
            <th>Name</th>
            <th>Birthday</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    @foreach($cat as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->dob}}</td>

            <td><a href="{{route('cats.edit', $item->id)}}">Edit</a></td>
            <td>
                <form action="{{route('cats.destroy', $item->id)}}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {{ $cat->links() }}
@endsection