@extends('layouts.default')

@section('title', 'Login')

@section('content')
<div>Logged in as {{ auth()->user()->name }}</div>
@endsection
