@extends('layouts.app')

@section('content')

    <h1 class="text-center">The Offers</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->title}}</td>
            <td>{{$offer->body}}</td>
            <td> <button class="btn btn-dark"> <a href="{{route('offers.edit',$offer->id)}}">Update</a> </button></td>
            <td>
                {!! Form::open(['method' => 'DELETE','action' => ['OffersController@destroy',$offer->id]]) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
