@extends('layout.layout-admin')

@section('title', 'Administrador')

@section('content')
<div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
    <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin.proposal')}}">Propuestas</a>
    <a class="px-5 font-bold text-lg text-red-600" href="{{route('proveicydet.admin.users')}}">Usuarios</a>
    <a class="px-5 font-bold text-lg text-cyan-600" href="{{route('proveicydet.admin')}}">Inicio</a>
    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
</div>
<div id="father" class="flex items-center justify-center h-auto">
    <div class="wrapper bg-white w-full md:w-[90%] h-auto] mt-10 ">
        <section id="bienvenida" class="w-full h-[60vh] md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
            <h1 class="text-xl lg:text-4xl font-bold">Usuarios</h1>
            <br>
            <form action="{{ route('proveicydet.admin.create') }}">
                <button type="submit" class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-[50%] py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear nuevo usuario</button>
            </form><br>
            <div class="overflow-x-auto relative py-3">
            <table class="w-full text-sm text-left">
                <thead class="bg-gold text-xs uppercase text-white">
                  <tr>
                    <th scope="col" class="py-3 px-6">Nombre(s)</th>
                    <th scope="col" class="py-3 px-6">Apellidos</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Sector</th>
                    <th scope="col" class="py-3 px-6">Participación</th>
                    <th scope="col" class="py-3 px-6">Sede</th>
                    <th scope="col" class="py-3 px-6">Escolaridad</th>
                    <th scope="col" class="py-3 px-6">Opciones</th>
                  </tr>
                </thead>
                @foreach ($usuarios as $user)
                @if ($user->role != 'admin')
                <tbody>
                    <td class="p-2 text-black">
                        {{$user->name}}
                    </td>
                    <td class="p-2 text-black">
                        {{$user->last_name}}
                    </td>
                    <td class="p-2 text-black">
                        {{$user->email}}
                    </td>
                    <td class="p-2 text-black">
                        {{$user->sector}}
                    </td>
                    <td class="p-2 text-black">
                        @if ($user->participation == 0)
                            No presencial
                        @else
                            Presencial
                        @endif
                    </td>
                    <td class="p-2 text-black">
                        @if ($user->fk_idHeadquarters == null)
                            Indefinido
                        @else
                            @foreach ($sedes as $sede)
                                @if ($sede->idHeadquarters == $user->fk_idHeadquarters)
                                    {{$sede->name}}
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="p-2 text-black">
                        @foreach ($escolaridades as $escolaridad)
                            @if ($escolaridad->idEducations == $user->fk_idEducations)
                                @if ($user->fk_idEducations == 5)
                                    Indefinido
                                @else
                                    {{$escolaridad->name}}
                                @endif
                            @endif
                        @endforeach
                    </td>
                    <td class="p-2 text-black flex flex-wrap">
                        <!-- E D I T A R -->
                        <form action="{{ route('proveicydet.admin.editar',$user->idUser) }}" method="GET">
                            @csrf
                            <button type="submit" class="h-8 w-8" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" stroke="green" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>                              
                            </button>
                        </form>
                        
                        <!-- E L I M I N A R -->
                        
                        <form action="{{route('proveicydet.admin.delete', $user->idUser)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="h-8 w-8" title="Eliminar" onclick="return confirm('¿Quieres borrar a este usuario?')">
                                <svg xmlns="http://www.w3.org/2000/svg" stroke="red" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>                              
                            </button>
                        </form>
                        
                    </td>
                </tbody>
                @endif
                
                @endforeach
                </table>
            </div>
            {{ $usuarios->links() }}
        </section>
    </div>
</div>


</div>



@endsection
