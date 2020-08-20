@extends('layouts.app')

@section('content')
    <type :name='@json($name)' :list='@json($properties)'></type>
@endsection
