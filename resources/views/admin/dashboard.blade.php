@extends('admin.include.header')
@section('container')

<h3>Selamat datang {{ auth()->user()->name }}</h3>
@endsection
