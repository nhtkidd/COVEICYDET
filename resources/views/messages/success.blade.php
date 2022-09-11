@extends('layout.layout')

@section('title', 'Confirmacion de registro')

@section('content')

    <div class="flex items-center justify-center">

        <div class="w-[85%] md:w-[60%] h-auto text-center p-10 2xl:mt-20">
            <h2 class="text-3xl font-bold p-4">Registro exitoso</h2>
            <h5>Por favor, proceda a iniciar sesión para continuar</h5>
            <br>
            <a href="{{route('proveicydet.login')}}" class="px-6 py-2 w-auto h-auto bg-gold hover:bg-[#998b47] rounded-lg text-lg font-semibold text-white">Continuar</a>
        </div>
        


    </div>

@endsection
