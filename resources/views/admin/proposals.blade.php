@extends('layout.layout-admin')

@section('title', 'Propuestas')

@section('content')
<div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
    <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
    <a class="px-5 font-bold text-lg text-gray-500 underline" href="{{route('proveicydet.admin.proposal')}}">Propuestas</a>
    <a class="px-5 font-bold text-lg text-black" href="{{route('proveicydet.admin.users')}}">Usuarios</a>
    <a class="px-5 font-bold text-lg text-black" href="{{route('proveicydet.admin')}}">Inicio</a>
    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
</div>
<div id="father" class="flex items-center justify-center h-auto">
    <div class="wrapper bg-white w-full md:w-[90%] h-auto] mt-10 ">
              
        <section id="bienvenida" class="w-full h-[60vh] md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
            <h1 class="text-xl lg:text-4xl font-bold">Propuestas por Validar</h1>
            <form>
                @csrf
                <div class="flex flex-wrap w-100 flex-row-reverse p-4">
                    <div class="w-25 p-2">
                        <button type="submit" class="text-white bg-blue-400 hover:bg-[#635C44]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1vw" fill="white" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                            
                        </button>
                    </div>
                    <!--<div class="buscador-texto p-2">
                        <input type="text" name="sectors" id="buscar" class="w-100 inputsStyle focus:outline-none focus:shadow-outline" placeholder="Buscar" value="">
                    </div>-->
                    <div class="p-2">
                        <select name="sectors" id="sectors" class="inputsStyle focus:outline-none focus:shadow-outline">
                            <option value="">Todos los sectores</option>
                            @foreach ($sectors as $sector)
                                @if ($sectorFind == $sector->name)
                                    <option selected value="{{$sector->name}}">{{$sector->name}}</option>
                                @else
                                    <option value="{{$sector->name}}">{{$sector->name}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="p-2">
                        <select name="sedes" id="sedes" class="inputsStyle focus:outline-none focus:shadow-outline">
                            <option value="">Todas las sedes</option>
                            @foreach ($sedes as $headquarter)
                                @if ($sedeFind == $headquarter->idHeadquarters)
                                    <option selected value="{{$headquarter->idHeadquarters}}">{{$headquarter->name}}</option>
                                @else
                                    <option value="{{$headquarter->idHeadquarters}}">{{$headquarter->name}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            
            
            <br>
            <div class="flex flex-warp">
                <a class="px-5 font-bold text-lg text-gray-600 underline" href="{{route('proveicydet.admin.proposal')}}" title="Propuestas por validar">Por validar</a>
                <a class="px-5 font-bold text-lg text-green-600" href="{{route('proveicydet.admin.aceptado',$sedeFind)}}" title="Propuestas aceptadas">Aceptadas</a>
                <a class="px-5 font-bold text-lg text-gray-600" href="{{route('proveicydet.admin.proposalNS')}}" title="Propuestas rechazadas">Sin sede</a>
                <a class="px-5 font-bold text-lg text-green-600" href="{{route('proveicydet.admin.proposalNSAccepted')}}" title="Propuestas sin sede">Aceptadas sin sede</a>
                <a class="px-5 font-bold text-lg text-red-600" href="{{route('proveicydet.admin.rechazado')}}" title="Propuestas sin sede">Rechazadas</a>
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
                        <th scope="col" class="py-3 px-6">Ver</th>
                    </tr>
                </thead>
                @foreach ($proposals as $proposal)
                @if ($proposal->status == null)
                    
                
                <tbody>
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
                                <p class="truncate w-56">No definido</p>
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
                        <td class="text-black p-2 w-86 flex flex-nowrap justify-center align-content-center">
                            <!-- E D I T A R -->
                            <form action="{{ route('proveicydet.admin.view',$proposal->idProposal) }}" method="GET">
                                @csrf
                                <button type="submit" class="h-8 w-8" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="orange" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>                     
                                </button>
                            </form>
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
