@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Offer</h1>


    @if(Session::has('success'))
        <div class="alert alert-success container text-center">{{Session::get('success')}} </div>
    @endif
    {!! Form::model($offer,['method' => 'PATCH','action' => ['OffersController@update',$offer->id],'class'=>'container','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('title', 'title') }}
        {{ Form::text('title', null, ['class' => 'form-control'])}}
    </div>
    @error('title')
    <div class="alert alert-danger text-center"> {{$message}}</div>
    @enderror
    <div class="form-group">
        {{ Form::label('body', 'body') }}
        {{ Form::textarea('body', null, ['class' => 'form-control'])}}
    </div>
    @error('body')
    <div class="alert alert-danger text-center"> {{$message}}</div>
    @enderror
    <div class="form-group">
        {{ Form::label('photo', 'Upload Photo') }}
        {{ Form::file('photo', null, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">

        {{ Form::submit('add offer', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
@endsection
