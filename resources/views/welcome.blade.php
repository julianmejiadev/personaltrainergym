@extends('layouts.app')

@section('titulo', 'mis productos')

@section('contenido')
    <h1 class="text-blue-400">LISTA DE PRODUCTOS</h1>
    <ul>
        @foreach ($productos as $producto)
        <li>{{$producto->nombre}} - precio: {{$producto->precio}} </li>
        @endforeach
    </ul>
@endsection