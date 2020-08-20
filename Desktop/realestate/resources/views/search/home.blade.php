@extends('layouts.app')

@section('content')
    <search  :list='@json($properties)'></search>
@endsection