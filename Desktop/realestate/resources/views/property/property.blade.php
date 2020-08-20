@extends('layouts.app')

@section('content')
    <property :categories='@json($property->categories)' :property='@json($property)'></property>
@endsection