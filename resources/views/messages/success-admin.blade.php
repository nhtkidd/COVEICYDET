@extends('layout.layout-admin')

@section('title', 'Confirmacion de registro')

@section('content')

    <div class="flex items-center justify-center">

        <div class="w-[85%] md:w-[60%] h-auto text-center p-10 2xl:mt-20">
            <h2 class="text-3xl font-bold p-4">Registro exitoso</h2>
            <br>
            <a href="{{route('proveicydet.admin.users')}}" class="px-6 py-2 w-auto h-auto bg-gold hover:bg-[#998b47] rounded-lg text-lg font-semibold text-white">Continuar</a>
        </div>
        


    </div>

@endsection
