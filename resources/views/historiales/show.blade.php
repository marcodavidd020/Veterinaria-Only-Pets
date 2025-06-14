@extends('home')
@section('title', 'historial-clinico')
@php
$active = Auth::user()->hasRole('cliente') ? 'mis-mascotas' : 'historial-clinico';
@endphp
@section($active, 'active')

@section('css-derecha')
    <link rel="stylesheet" href="{{ asset('css/table-information.css') }}">
@endsection

@section('contenido')



    @livewire('historial-clinico.show', ['historial' => $historiale])
   

@endsection

@section('body-final')

    <x-diagnosticos-input id="diagnosticosFormInput" />0

@endsection



