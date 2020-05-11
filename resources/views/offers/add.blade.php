@extends('layouts.app')

@section('content')
<h1 class="text-center">{{__("global.add")}}</h1>


@if(Session::has('success'))
    <div class="alert alert-success container text-center">{{Session::get('success')}} </div>
    @endif
{!! Form::open(['method' => 'POST','action'=>'OffersController@store','class'=>'container','enctype' => 'multipart/form-data']) !!}
{!! csrf_field() !!}
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

    <button id="add_offer">Click</button>
</div>
{!! Form::close() !!}
@endsection

@section('footer')

@endsection
