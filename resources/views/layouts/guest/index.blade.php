@extends('layouts.app')

@section('content')
    @include('partials.navbar')

    @yield('content-guest')

    @include('partials.footer')
@endsection
