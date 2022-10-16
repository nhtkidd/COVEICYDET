@extends('layout.layout-admin')

@section('title', 'Administrador')

@section('content')
<div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
    <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin.proposal')}}">Propuestas</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin.users')}}">Usuarios</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin')}}">Inicio</a>
    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
</div>
<div id="father" class="flex items-center justify-center h-auto">
    <div class="wrapper bg-white w-full md:w-[90%] h-auto] mt-10 ">
        <section id="bienvenida" class="w-full h-[60vh] md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
            <h1 class="text-xl lg:text-4xl font-bold">ADMINISTRADOR</h1>
        </section>
    </div>
</div>


</div>



@endsection
