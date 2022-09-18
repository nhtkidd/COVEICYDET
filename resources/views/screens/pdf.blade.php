@extends('layout.layout')

@section('title', 'Vista Propuesta')

@section('content')

    @auth
            <div class="flex border-b-4 border-[#AA983F] py-2">
               <div class="basis-1/2 px-5 ">
                <a href="{{url()->previous()}}" type="button" class="text-white bg-[#635C44] hover:bg-[#635C44]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                    <svg style="color: white; padding-right:5%" xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor" class="bi bi-arrow-left-circle " viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" fill="white"></path> </svg>
                    Atrás
                </a>
               </div>
                <div class="basis-full flex flex-row-reverse  ">
                    <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
                    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
                </div>
           
            </div>
        <div id="father" class="flex items-center justify-center h-auto">
            <div class="wrapper bg-white w-full md:w-[80%] h-auto] mt-10 ">
                <section id="bienvenida" class="w-full h-auto md:h-[35%] lg:h-[50%]  p-[5%] text-center  ">
                    @error('message')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                        @foreach ($propuesta as $data)
                        @php
                        $objetivos = $data->fk_idOds ;
                        $datos= explode(',',$objetivos) ;
                        $count = sizeOf($datos);
                        $odsOne = null;
                        $odsTwo = null;
                        $odsThree = null;
                        $odsFour = null;
                        $odsFive = null; 
                        ;
                        for ($i=0; $i <= $count-1 ; $i++) { 
                            if ($i == 0) {
                                $odsOne = $datos[$i];
                            }
                            if ($i == 1) {
                                $odsTwo = $datos[$i];
                            }
                            if ($i == 2) {
                                $odsThree = $datos[$i];
                            }
                            if ($i == 3) {
                                $odsFour = $datos[$i];
                            }
                            if ($i == 4) {
                                $odsFive = $datos[$i];
                            }
                        }
                        //echo $odsOne."-".$odsTwo."-".$odsThree."-".$odsFour."-".$odsFive;
                        @endphp
                    <h1 class="text-xl lg:text-4xl font-bold">Gracias por tu interes en participar con tu propuesta.</h1>
                </section>
                {{-- FORMULARIO --}}
                <form action="" method="post" class=" p-[5%] mt-5 lg:mt-0  " name="form1">
                    @csrf
                    @method('GET')
                    <div class="my-3">
                        <label class="labelStyle ml-2 2xl:text-xl">
                             Área
                        </label>
                        <div class="inputsStyle md:w-[60%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->area }}
                        </div>
                        
                    </div>
                    
                    <div class="my-3">
                        <label class="labelStyle ml-2 2xl:text-xl">
                             Problema prioritario
                        </label>
                        
                        <div class="w-[90%] h-auto" id="resultados">
                            <!-- M O S T R A R - A N E X O S -->
                            @foreach ($annexes as $anexo)
                                @if ($anexo->idAnnexes == $data->fk_idAnnexe)
                                    <div class="inputsStyle md:w-full h-auto focus:outline-none focus:shadow-outline">
                                        {{ $anexo->problematic }}
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <div class="my-3">
                        <label class="labelStyle ml-2 2xl:text-xl">
                             Nombre de la propuesta

                        </label>
                        <div class="inputsStyle md:w-[60%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->name }}
                        </div>
                        <label class="labelStyle ml-2 2xl:text-xl">
                             Objetivo de la propuesta

                        </label>
                        <div class="inputsStyle md:w-[90%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->objetive }}
                        </div>
                        <label class="labelStyle ml-2 2xl:text-xl">
                             Descripción actual de la problemática

                        </label>
                        <div class="inputsStyle md:w-[90%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->description }}
                        </div>
    
                        <label class="labelStyle ml-2 2xl:text-xl">
                             Grupo de impacto

                        </label>
                        <div class="inputsStyle md:w-[90%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->group }}
                        </div>

                        <label class="labelStyle ml-2 2xl:text-xl">
                             Lugar o región de impacto (espacio físico):
                        </label>
                        <div class="inputsStyle md:w-[60%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->fk_idPlaces }}
                        </div>

                        <label class="labelStyle ml-2 2xl:text-xl">
                             ¿Qué esperas lograr con tu propuesta?

                        </label>
                        <div class="inputsStyle md:w-[90%] h-auto focus:outline-none focus:shadow-outline">
                            {{ $data->reach }}
                        </div>
                        
                        {{-- AQUI VAN LOS CHECKBOXES --}}
                        <label class="labelStyle ml-2 2xl:text-xl md:w-[80%]" for="firstName">
                             De acuerdo con la naturaleza de tu
                            propuesta, selecciona el o los objetivos
                            de Desarrollo Sostenible que impacta

                        </label>
                        <div class="inputsStyle md:w-[60%] h-auto focus:outline-none focus:shadow-outline">
                            
                        @foreach ($ods as $odsOption)
                            @if ($odsOption->idOds == $odsOne || $odsOption->idOds == $odsTwo || $odsOption->idOds == $odsThree || $odsOption->idOds == $odsFour || $odsOption->idOds == $odsFive)
                                {{ $odsOption->objetive }}<br>
                            @endif
                        @endforeach
                        </div>

                            </div>
                        {{-- BOTON SUBMIT --}}
                        @endforeach

                    </div>

                </form>
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
