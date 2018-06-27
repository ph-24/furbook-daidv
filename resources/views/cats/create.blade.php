@extends('layouts.master')
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
{!! Form::open(['url' => route('cat.store')]) !!}
@include('partials.forms.cat')
{!! Form::close() !!}
@stop