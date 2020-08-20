@extends('layouts.app')

@section('content')
    <lease :name='@json($name)' :list='@json($properties)'></lease>
@endsection
