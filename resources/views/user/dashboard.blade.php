 @extends('user.include.header')
 @section('container')

 <h3 class="text">selamat datang {{ auth()->user()->name }}</h3>
 @endsection
