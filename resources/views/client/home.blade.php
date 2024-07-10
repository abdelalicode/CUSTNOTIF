@extends('client.index')

@section('content')
    <h1 class="font-medium text-2xl">Hello {{ auth()->user()->firstname }} {{ auth()->user()->lastname }} !</h1>

@endsection
