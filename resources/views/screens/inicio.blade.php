@extends('layout.layout')

@section('title', 'PROVEICYDET')

@section('content')

    @auth
    <div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
        <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
        <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
    </div>
    <div id="father" class="flex items-center justify-center h-auto">
        <div class="wrapper bg-white w-full md:w-[80%] h-auto] mt-10 ">
            <section id="bienvenida" class="w-full h-[40vh] md:h-[35%] lg:h-[50%]  p-[5%] text-center  ">
                <h1 class="text-xl lg:text-4xl font-bold">Tus Propuestas.</h1>
                @if (count($proposal)>0)
                <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">
                    Ya haz iniciado una propuesta
                </h2>
                @if (count($proposal) != 2)
                <br>
                <form action="{{ route('proveicydet.propuesta') }}"></form>
                <button type="submit" class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-[20%] py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear una nueva Propuesta</button>
                <br>
                @endif
                <br>
                <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gold text-xs uppercase text-white">
                      <tr>
                        <th scope="col" class="py-3 px-6">Propuesta</th>
                        <th scope="col" class="py-3 px-6">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($proposal as $data)
                        <tr class="bg-spaceGray ">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                {{$data->name}}
                            </th>
                            <td class="py-4 px-6 text-black">
                                @if ($data->finished == null)
                                <form action="{{route('proveicydet.propuesta.edit',$data->idProposal)}}" method="GET">
                                    <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Continuar</button>
                                </form>
                                
                                @endif
                                @if ($data->finished != null)
                                <button disabled type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Enviado</button>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                @endif
                @if (count($proposal)==0)
                <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">
                    Crea una propuesta nueva
                </h2>
                <br>
                
                    
                @endif
            </section>
        </div>
    </div>


    </div>
    @endauth
    @guest
        <div class="w-full grid items-center justify-center ">
            <h1 class="text-3xl font-bold text-center  mt-5">Inicia sesión para ver el contenido</h1>
            <a class="text-xl text-white font-bold text-center bg-[#AA983F] hover:bg-[#8c7e36] p-2 m-[10%] rounded focus:outline-none focus:shadow-outline "   href="{{ route('proveicydet.login') }}">Inicia sesión</a>
        </div>

        


    @endguest
@endsection
