@extends('layouts.app')

@section('content')
    <category :name='@json($category)' :list='@json($properties)'></category>
@endsection
