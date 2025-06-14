@extends('home')
@section('title', 'Servicios')
@section('bitacoras', 'active')
@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
@endsection
@section('contenido')

    @livewire('bitacora.index')   

@endsection
