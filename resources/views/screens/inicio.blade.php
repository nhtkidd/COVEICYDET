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
        
                <section id="bienvenida" class="w-full h-[60vh] md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
                    <h1 class="text-xl lg:text-4xl font-bold">Tus Propuestas.</h1>

                    @if (count($proposal) > 0)
                        <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">

                        </h2>
                        @error('message')
                            <br>
                            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                <p class="font-bold">Error</p>
                                <p>{{ $message }}</p>
                            </div>
                            <br>
                        @enderror

                        @if (session()->has('denegado'))
                            <br>
                            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                <p class="font-bold">Error</p>
                                <p class="text-sm">{{ session()->get('denegado') }}</p>
                            </div>
                            <br>
                        @endif
                        @if (count($proposal) < 2)
                            @foreach ($proposal as $finish)
                                @if ($finish->finished == null)
                                    <br>
                                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                        <p class="font-bold">Importante!</p>
                                        <p>No puedes crear otra propuesta hasta concluir con la propuesta actual.</p>
                                    </div>
                                    <br>
                                @endif

                                @if ($finish->finished == true)
                                    <br>
                                    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                                        role="alert">
                                        <p class="font-bold">Mensaje informativo</p>
                                        <p class="text-sm">Solo puedes crear y enviar 2 propuestas.</p>
                                    </div>
                                    <br>
                                    <form action="{{ route('proveicydet.propuesta') }}">
                                        <button type="submit"
                                            class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-[50%] py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
                                            una nueva Propuesta</button>
                                    </form>
                                    <br>
                                @endif
                            @endforeach
                        @endif
                        <!-- V A L I D A R - P R O P U E S T A S - F I N A L I Z A D A S -->
                        @if ($proposalsFinished == 2)
                            @if ($confirmHeadquarter == 'true')
                                <br>
                                <div class="overflow-x-auto relative">
                                    <table class="w-full text-sm text-left">
                                        <thead class="bg-gold text-xs uppercase text-white">
                                            <tr>
                                                <th scope="col" class="py-3 px-6">Propuesta</th>
                                                <th scope="col" class="py-3 px-6">Estado</th>
                                                <th scope="col" class="py-3 px-6">Mostrar</th>
                                                <th scope="col" class="py-3 px-6">Estatus de propuesta</th>
                                                <th scope="col" class="py-3 px-6">Tu presentación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposal as $data)
                                                <tr class="bg-spaceGray ">
                                                    <th scope="row"
                                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                                        {{ $data->name }}
                                                    </th>
                                                    <td class="py-4 px-6 text-black">
                                                        @if ($data->finished == null)
                                                            <form
                                                                action="{{ route('proveicydet.propuesta.edit', $data->idProposal) }}"
                                                                method="GET">
                                                                <button type="submit"
                                                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                                                    Continuar</button>
                                                            </form>
                                                        @endif
                                                        @if ($data->finished != null)
                                                            <button disabled type="button"
                                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                Enviado</button>
                                                        @endif
                                                    </td>
                                                    <td class="py-4 px-6 text-black">
                                                        @if ($data->finished == null)
                                                            <button disabled type="buttom"
                                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                                Debes enviar la propuesta</button>
                                                            </form>
                                                        @endif
                                                        @if ($data->finished != null)
                                                            <form
                                                                action="{{ route('proveicydet.propuesta.mostrar', $data->idProposal) }}"
                                                                method="GET">
                                                                <button type="submit"
                                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                    Consultar</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                    <td class="py-4 px-6 text-black">

                                                        @if ($data->status == 'Aceptar')
                                                            <span
                                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                Aceptada
                                                            </span>
                                                        @endif


                                                        @if ($data->status == 'Rechazar')
                                                            <span
                                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                                Rechazada
                                                            </span>
                                                        @endif


                                                        @if ($data->status == null)
                                                            <span
                                                                class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                                                En revision
                                                            </span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($data->file != null)
                                                            <a class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                                                                href="{{ url('storage/docs/' . $data->file) }}"
                                                                target="_blank">Ver</a>
                                                        @else
                                                            <a href="{{ route('proveicydet.file', [$data->idProposal]) }}"
                                                                class="focus:outline-none text-white bg-[#484332] hover:bg-[#484332] focus:ring-4 focus:ring-[#484332] font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#484332] dark:hover:bg-[#484332] dark:focus:ring-[#484332]">
                                                                Subir archivo
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="mt-5 flex justify-content-center items-center align-center flex-col">
                                    <h5>Para continuar, necesitamos que confirmes tu sede de participacion presencial, puedes
                                        cambiarla si lo necesitas.</h5>
                                    <br>
                                    <form action="{{ route('proveicydet.updateHeadquarter') }}" method="post">
                                        @csrf
                                        <select id="selectSede" name="fk_idHeadquarters" value=""
                                            class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                            required title="Selecciona tu sede">
                                            <option value="{{ $id }}" selected>{{ $findHeadquarterUser }}</option>
                                            <optgroup label="Sedes">
                                                @foreach ($sedes as $sede)
                                                    <option value="{{ $sede->idHeadquarters }}">{{ $sede->name }}</option>
                                                @endforeach
                                        </select>
                                        <button
                                            class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            type="submit">
                                            Confirmar
                                        </button>
                                    </form>

                                </div>
                            @endif
                        @else
                            <br>
                            <div class="overflow-x-auto relative">
                                <table class="w-full text-sm text-left">
                                    <thead class="bg-gold text-xs uppercase text-white">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">Propuesta</th>
                                            <th scope="col" class="py-3 px-6">Estado</th>
                                            <th scope="col" class="py-3 px-6">Mostrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proposal as $data)
                                            <tr class="bg-spaceGray ">
                                                <th scope="row"
                                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                                    {{ $data->name }}
                                                </th>
                                                <td class="py-4 px-6 text-black">
                                                    @if ($data->finished == null)
                                                        <form
                                                            action="{{ route('proveicydet.propuesta.edit', $data->idProposal) }}"
                                                            method="GET">
                                                            <button type="submit"
                                                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                                                Continuar</button>
                                                        </form>
                                                    @endif
                                                    @if ($data->finished != null)
                                                        <button disabled type="button"
                                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                            Enviado</button>
                                                    @endif
                                                </td>
                                                <td class="py-4 px-6 text-black">
                                                    @if ($data->finished == null)
                                                        <button disabled type="buttom"
                                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                            Debes enviar la propuesta</button>
                                                        </form>
                                                    @endif
                                                    @if ($data->finished != null)
                                                        <form
                                                            action="{{ route('proveicydet.propuesta.mostrar', $data->idProposal) }}"
                                                            method="GET">
                                                            <button type="submit"
                                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                Consultar</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <!-- V A L I D A R - P R O P U E S T A S - F I N A L I Z A D A S -->


                    @endif
                    @if (count($proposal) == 0)
                        <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">
                            Crea una propuesta nueva
                        </h2>
                        <br>
                        <br>
                        <form action="{{ route('proveicydet.propuesta') }}">
                            <button type="submit"
                                class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-[50%] py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear
                                una nueva Propuesta</button>
                        </form>
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
            <a class="text-xl text-white font-bold text-center bg-[#AA983F] hover:bg-[#8c7e36] p-2 m-[10%] rounded focus:outline-none focus:shadow-outline "
                href="{{ route('proveicydet.login') }}">Inicia sesión</a>
        </div>


    @endguest
@endsection
