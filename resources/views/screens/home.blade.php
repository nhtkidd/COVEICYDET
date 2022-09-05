@extends('layout.layout')

@section('title', 'COVEICYDET')

@section('content')

    <div class="flex items-center justify-center">

        <div class="w-[85%] md:w-[60%] h-auto text-center p-10 2xl:mt-20">
            <h2 class="text-3xl font-bold p-4">Bienvenido</h2>
            <h1 class="text-2xl md:text-2xl lg:text-xl 2xl:text-2xl font-normal">En esta plataforma podrás dar soluciones a problematicas
                reales que se viven en nuestra entidad, atraves de propuestas
                que se evaluarán por un jurado, las soluciones deben ser planteadas.
                Para más informacion, ingresa a la plataforma.
            </h1>
            <br>
            <a href="{{route('coveicydet.login')}}" class="px-6 py-2 w-auto h-auto bg-gold hover:bg-[#998b47] rounded-lg text-lg font-semibold text-white">Ingresa</a>
        </div>
        


    </div>

@endsection
