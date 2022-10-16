@extends('layout.layout-admin')

@section('title', 'Propuestas')

@section('content')
<div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
    <a class="px-5 font-bold text-lg text-cyan-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
    <a class="px-5 font-bold text-lg text-red-600" href="{{route('proveicydet.admin.proposal')}}">Propuestas</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin.users')}}">Usuarios</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin')}}">Inicio</a>
    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
</div>
<div id="father" class="flex items-center justify-center h-auto">
    <div class="wrapper bg-white w-full md:w-[90%] h-auto] mt-10 ">
              
        <section id="bienvenida" class="w-full h-[60vh] md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
            <h1 class="text-xl lg:text-4xl font-bold">Propuestas Aceptadas</h1>
            <div class="flex flex-wrap w-50 flex-row-reverse p-4">
                <div class="w-25 p-2">
                    <button type="submit" class="text-white bg-blue-400 hover:bg-[#635C44]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1vw" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                        
                    </button>
                </div>
                <div class="buscador-texto w-25 p-2">
                    <input type="text" name="buscador" id="buscar" class="w-25 inputsStyle focus:outline-none focus:shadow-outline" placeholder="Buscar">
                </div>
                <div class="w-25 p-2">
                    <select name="sectors" id="sectores" class="inputsStyle focus:outline-none focus:shadow-outline">
                        <option value="">Sectores</option>
                        @foreach ($sectors as $sector)
                            <option value="{{$sector->name}}">{{$sector->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            
            <br>
            <div class="flex flex-warp">
                <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin.proposal')}}">Por validar</a>
                <a class="px-5 font-bold text-lg text-green-600 underline">Aceptadas</a>
                <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin.rechazado')}}">Rechazadas</a>
            </div>
            <!-- M E N S A J E S -->
            @if(session()->has('Aceptado'))
                <br>
                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 w-25" role="alert">
                        <p class="text-sm">{{ session()->get('Aceptado') }}</p>
                    </div>
                <br>
            @endif
            @if(session()->has('Rechazado'))
                <br>
                <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 w-25" role="alert">
                    <p class="text-sm">{{ session()->get('Rechazado') }}</p>
                </div>
                <br>
            @endif
            <!-- M E N S A J E S -->

            <br><br>
            <div class="overflow-x-auto relative py-3">
            <table class="w-full text-sm text-left">
                <thead class="bg-gold text-xs uppercase text-white">
                    <tr>
                        <th scope="col" class="py-3 px-6">Nombre</th>
                        <th scope="col" class="py-3 px-6">Sector</th>
                        <th scope="col" class="py-3 px-6">Participación</th>
                        <th scope="col" class="py-3 px-6">Sede</th>
                        <th scope="col" class="py-3 px-6">Usuario</th>
                        <th scope="col" class="py-3 px-6">Región</th>
                        <th scope="col" class="py-3 px-6">Área</th>
                    </tr>
                </thead>
                @foreach ($proposals as $proposal)
                @if ($proposal->status == 'Aceptar')
                    
                
                <tbody>
                    <!--<td class="text-black p-2 h-25 bg-blue-400 truncate text-ellipsis overflow-hidden">
                        <p class="">{{$proposal->objetive}}</p>
                    </td>-->
                    
                    @foreach ($users as $user)
                        @if ($user->idUser == $proposal->fk_idUsers)
                        <td class="text-black p-2">
                            <p class="w-56">{{$proposal->name}}</p>
                        </td>
                        <td class="text-black p-2">
                            <p class="truncate w-56">{{$user->sector}}</p>
                        </td>
                        <td class="text-black p-2">
                            @if ($user->participation == 1)
                                <p class="truncate w-36">Presencial</p>
                            @else
                                <p class="truncate w-36">No presencial</p>
                            @endif
                            
                        </td>
                        <td class="text-black p-2">
                            @foreach ($sedes as $sede)
                                @if ($user->fk_idHeadquarters == $sede->idHeadquarters)
                                    <p class="truncate w-56">{{$sede->name}}</p>
                                @endif
                                
                            @endforeach
                            @if ($user->fk_idHeadquarters == null)
                                <p class="truncate w-56">Sin especificar</p>
                            @endif
                        </td>
                        <td class="text-black p-2">
                            <p class="truncate w-86">{{$user->name}}</p>
                        </td>
                        <td class="text-black p-2">
                            <p class="truncate w-56">{{$proposal->fk_idPlaces}}</p>
                        </td>
                        <td class="text-black p-2">
                            <p class="truncate w-86">{{$proposal->area}}</p>
                        </td>
                        @endif
                    @endforeach
                    
                </tbody>
                @endif
                @endforeach
                </table>
                
            </div>
            {{ $proposals->links() }}
        </section>
    </div>
</div>


</div>



@endsection
