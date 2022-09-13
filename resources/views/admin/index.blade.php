@extends('layout.layout')

@section('title', 'Administrador')

@section('content')
<div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
    <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
</div>
    <h1>BIENVENIDO AL TABLERO DE ADMINISTRADOR</h1>



@endsection
