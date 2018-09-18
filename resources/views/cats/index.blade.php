@extends('layouts.master')

@section('header')
    @if(isset($breed))
        <a href="{{route('cat.index')}}">Back to the overview</a>
    @endif
    <h2>
        All @if (isset($breed)) {{$breed->name}}@endif
        <a href="{{route('cat.create')}}" class="btn btn-primary pull-right">Add a new cat</a>
    </h2>
@endsection

@section('content')
    @include('partials.cat')
@endsection