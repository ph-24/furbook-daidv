@extends('layouts.master')
@section('header')
    <a href="{{ route('cat.index') }}">Back to overview</a>
    <h2>
        {{ $cat->name }}
    </h2>
    <a href="{{ route('cat.edit', $cat->id) }}">
        <span class="glyphicon glyphicon-edit"></span>
        Edit
    </a>
    <form id="form_delete" action="{{route('cat.destroy', $cat->id)}}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a href="javascript:document.getElementById('form_delete').submit()">
            <span class="glyphicon glyphicon-trash"></span>
            Delete
        </a>
    </form>
    <p>Last edited: {{ $cat->updated_at->diffForHumans() }}</p>
@stop
@section('content')
    <p>Date of Birth: {{ $cat->date_of_birth }}</p>
    <p>
        @if ($cat->breed)
            Breed:
            <a href="{{url('cats/breeds/'. $cat->breed->name)}}">{{$cat->breed->name}}</a>
        @endif
    </p>
@stop