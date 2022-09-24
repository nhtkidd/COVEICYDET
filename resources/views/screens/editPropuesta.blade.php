@extends('layout.layout')

@section('title', 'Editar Propuesta')

@section('content')

    @auth
        <div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">

            <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
            <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
        </div>
        <div id="father" class="flex items-center justify-center h-auto">
            <div class="wrapper bg-white w-full md:w-[80%] h-auto] mt-10 ">
                <section id="bienvenida" class="w-full h-auto md:h-[35%] lg:h-[50%]  p-[5%] text-center  ">
                    @error(count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                <p class="font-bold">Error</p>
                                <p>{{ $error }}</p>
                            </div>
                        @endforeach
                    @enderror
                    @error('message')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    @foreach ($propuesta as $data)
                        @php
                            $objetivos = $data->fk_idOds;
                            $datos = explode(',', $objetivos);
                            $count = sizeOf($datos);
                            $odsOne = null;
                            $odsTwo = null;
                            $odsThree = null;
                            $odsFour = null;
                            $odsFive = null;
                            $lugarImpacto = null;
                            for ($i = 0; $i <= $count - 1; $i++) {
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
                        <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">
                            Es importante que tomes en cuenta la siguiente pregunta, que te ayudará a formular la propuesta:
                        </h2>
                        <div class="bg-spaceGray w-full h-auto mt-[5%] p-5">
                            <h3 class="text-sm lg:text-xl 2xl:text-2xl p-3 2xl:p-[4%] ">
                                ¿Qué proyectos o acciones de desarrollo tecnológico, científico e innovación consideras que debe
                                implementar o promover el Gobierno del Estado de Veracruz para solucionar los problemas
                                prioritarios nacionales y estatales?
                            </h3>
                        </div>
                </section>
                {{-- FORMULARIO --}}
                <form action="{{ route('proveicydet.propuesta.update', $data->idProposal) }}" method="post"
                    class=" p-[5%] mt-5 lg:mt-0  " name="form1">
                    @csrf
                    @method('PUT')
                    <div class="my-3">
                        <label class="labelStyle 2xl:text-xl">
                            1._ Para iniciar, deberás elegir qué área buscas atender con tu propuesta
                        </label>
                        <label class="text-red-800">*Este campo es obligatorio</label><br>
                        @foreach ($areas as $area)

                            @if ($area->name == $data->area)
                                <input type="radio" name="area" id="{{$area->position}}" value="{{$area->name}}" checked><label for="{{$area->position}}">{{$area->name}}</label><br>
                            @endif
                            @if ($area->name != $data->area)
                                <input type="radio" name="area" id="{{$area->position}}" value="{{$area->name}}"><label for="{{$area->position}}">{{$area->name}}</label><br>
                            @endif

                        @endforeach
                    </div>
                        @error('area')
                            <br>
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    <div class="my-3">
                        <label class="labelStyle 2xl:text-xl">
                            2._ Selecciona el problema prioritario que atenderá tu propuesta
                        </label>
                        <label class="text-red-800">*Este campo es obligatorio</label>
                        <input type="hidden" name="annexes" value="{{ $data->fk_idAnnexe }}">
                        <div class="bg-spaceGray w-full h-[30vh] overflow-y-auto" id="resultados">
                            <!-- MOSTRAR ANEXO GUARDADO ANERIORMENTE -->

                            @foreach ($annexes as $annexe)
                                @if ($annexe->idAnnexes == $data->fk_idAnnexe)
                                    <div
                                        class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                        <input checked id="bordered-radio-{{ $annexe->idAnnexes }}" type="radio" value="{{ $annexe->idAnnexes }}"
                                            name="fk_idAnnexe"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="bordered-radio-1"
                                            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                                            {{ $annexe->problematic }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                            <!-- M O S T R A R - A N E X O S -->


                        </div>
                    </div>
                    @error('fk_idAnnexe')
                        <br>
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                        <script src="{{asset('js/annexe.js')}}"></script>
                    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
                        integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
                    <div class="my-3">
                        <label class="labelStyle 2xl:text-xl">
                            3._ Registra los siguientes datos que se te solicitan
                        </label>
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Nombre de la propuesta
                        </label>
                        <label class="text-red-800">*Este campo es obligatorio</label><br>
                        <input class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline" type="text"
                            maxlength="200" name="name" placeholder="Máximo 100 caracteres, no debe contener caracteres especiales" value="{{ $data->name }}" pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,100}" title="El campo no debe contener caracteres especiales"/>
                            @error('name')
                            <br>
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Objetivo de la propuesta

                        </label>
                        <textarea name="objetive" id="" rows="10" cols="45"placeholder="Máximo 500 caracteres, no debe contener estos caracteres especiales & | <> # @"
                            maxlength="500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline margin-0" >@if ($data->objetive <> null && old('objetive') == null){{ $data->objetive }}@elseif(old('objetive') <> null){{old('objetive')}}@endif</textarea>
                            @error('objetive')
                            <br>
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Descripción actual de la problemática

                        </label>
                        <textarea name="description" id="" rows="10" cols="45" placeholder="Máximo 500 caracteres, no debe contener estos caracteres especiales & | <> # @"
                            maxlength="2500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline" >@if ($data->description <> null && old('description') == null){{ $data->description }}@elseif(old('description') <> null){{old('description')}}@endif</textarea>
                            @error('description')
                            <br>
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Grupo de impacto

                        </label>
                        <div class="md:w-[60%] bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                            role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                    </svg></div>
                                <div>
                                    <p class="font-bold">Importante</p>
                                    <p class="text-sm">Describe a detalle los
                                        beneficiarios, por ejemplo: comunidades,
                                        grupos indígenas, grupos vulnerables,
                                        niñez, etc.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <textarea name="group" id="" rows="10" cols="45" placeholder="Máximo 500 caracteres, no debe contener estos caracteres especiales & | <> # @"
                            maxlength="2500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline" >@if ($data->group <> null && old('group') == null){{ $data->group }}@elseif(old('group') <> null){{old('group')}}@endif</textarea>
                        @error('group')
                        <br>
                        <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Lugar o región de impacto (espacio físico):
                            <span class="text-slate-500">¿No conoces tu región? <a class="text-blue-800" target="_blank"
                                    href="{{ URL('docs/Municipios por region.pdf') }}">Haz click aquí</a> </span><br>
                        </label>
                        <!-- places -->
                        <select name="fk_idPlaces" id="lugarSelected"
                            class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">
                            @if (null == $data->fk_idPlaces)
                                <option selected value="">Selecciona la región</option>
                            @endif
                            @foreach ($places as $place)
                                @if ($place->name == $data->fk_idPlaces)
                                    {{ $lugarImpacto = $place->name }}
                                    <option selected value="{{ $place->name }}">{{ $place->name }}</option>
                                @endif
                                @if ($place->name != $data->fk_idPlaces)
                                    <option {{ old('fk_idPlaces') == $place->name ? 'selected' : '' }} value="{{ $place->name }}">{{ $place->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('fk_idPlaces')
                            <br>
                            <small class="text-red-800">{{ $message }}</small>
                        @enderror
                        <!-- places -->
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; ¿Qué esperas lograr con tu propuesta?

                        </label>
                        
                        <textarea name="reach" id="" rows="10" cols="45" placeholder="Máximo 500 caracteres, no debe contener estos caracteres especiales & | <> # @"
                            maxlength="2500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">@if ($data->reach <> null && old('reach') == null){{ $data->reach }}@elseif(old('reach') <> null){{old('reach')}}@endif</textarea>
                        @error('reach')
                        <br>
                        <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                        {{-- AQUI VAN LOS CHECKBOXES --}}
                        <label class="labelStyle 2xl:text-xl md:w-[60%]" for="firstName">
                            &nbsp; De acuerdo con la naturaleza de tu
                            propuesta, selecciona el o los objetivos
                            de Desarrollo Sostenible que impacta

                        </label>
                        <span class="block mb-2 text-sm font-thin text-gray-700 2xl:text-xl md:w-[60%]">
                            Podrás elegir como máximo 5 opciones</span>
                            <label class="text-red-800">*Este campo es obligatorio, selecciona al menos una opción para guardarlo</label>
                        <div class="w-[60%] h-[30vh] flex overflow-y-auto flex-col flex-grow">
                            @foreach ($ods as $odsOption)
                                @if ($odsOption->idOds == $odsOne ||
                                    $odsOption->idOds == $odsTwo ||
                                    $odsOption->idOds == $odsThree ||
                                    $odsOption->idOds == $odsFour ||
                                    $odsOption->idOds == $odsFive)
                                    <div
                                        class="md:w-full flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                        <input checked onchange="validacion('form1', this)" id="{{ $odsOption->idOds }}"
                                            type="checkbox" value="{{ $odsOption->idOds }}" name="fk_idOds[]"
                                            class="idOds w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $odsOption->idOds }}"
                                            class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">{{ $odsOption->objetive }}
                                        </label>
                                    </div>
                                @endif

                                @if ($odsOption->idOds != $odsOne &&
                                    $odsOption->idOds != $odsTwo &&
                                    $odsOption->idOds != $odsThree &&
                                    $odsOption->idOds != $odsFour &&
                                    $odsOption->idOds != $odsFive)
                                    <div
                                        class="md:w-full flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                        <input id="{{ $odsOption->idOds }}" type="checkbox" value="{{ $odsOption->idOds }}"
                                            name="fk_idOds[]" @if(is_array(old('fk_idOds')) && in_array($odsOption->idOds, old('fk_idOds'))) checked @endif
                                            class="idOds w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="{{ $odsOption->idOds }}"
                                            class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">{{ $odsOption->objetive }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach

                            <br>
                            <script language="javascript">
                                //VALIDACION CHECKBOX
                                $(document).ready(function() {
                                    var cantidadMaxima = 5;
                                    // Evento que se ejecuta al soltar una tecla en el input
                                    $("#cantidad").keydown(function() {
                                        $("input[type=checkbox].idOds").prop('checked', false);
                                        $("#seleccionados").html("0");
                                    });

                                    // Evento que se ejecuta al pulsar en un checkbox
                                    $("input[type=checkbox].idOds").change(function() {

                                        // Cogemos el elemento actual
                                        var elemento = this;
                                        var contador = 0;

                                        // Recorremos todos los checkbox para contar los que estan seleccionados
                                        $("input[type=checkbox].idOds").each(function() {
                                            if ($(this).is(":checked"))
                                                contador++;
                                        });



                                        // Comprovamos si supera la cantidad máxima indicada
                                        if (contador > cantidadMaxima) {
                                            alert("Has seleccionado más opciones de lo indicado.");

                                            // Desmarcamos el ultimo elemento
                                            $(elemento).prop('checked', false);
                                            contador--;
                                        }

                                        $("#seleccionados").html(contador);
                                    });
                                });
                            </script>



                        </div>
                        @error('fk_idOds')
                        <br>
                        <small class="text-red-800">*{{ $message }}</small>
                        @enderror

                        <input type="hidden" name="fk_idUsers" value="{{ auth()->user()->idUser }}">
                        {{-- BOTON SUBMIT --}}
                        @endforeach
                        <div class="my-5">
                            <button id="guardarTarde"
                                class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Guardar para más tarde
                            </button>

                            <div class="py-5">
                                <div class="md:w-auto bg-red-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5"
                                    role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                            </svg></div>
                                        <div>
                                            <p class="font-bold">Importante</p>
                                            <p class="text-sm">Recuerda que tu propuesta debe tener todos los campos
                                                completados para que sea valida por nuestros administradores, de lo contrario
                                                será eliminada.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <input type="checkbox" id="terminar" class="finalizar" name="finished" value="true">
                                <label for="terminar">He terminado la propuesta (Una vez terminada, ya no podrás modificarla.)</label>
     
                            </div>
                            <button id="enviar" disabled
                                class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Enviar propuesta
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <script type="text/javascript">
            var disabled = document.getElementById("enviar").disabled;
            var disabledTarde = document.getElementById("guardarTarde").disabled;

            document.querySelector(".finalizar").addEventListener('change', (event) => {
                if (event.target.checked) {
                    document.getElementById("enviar").disabled = false;
                    document.getElementById("guardarTarde").disabled = true;
                } else {
                    document.getElementById("enviar").disabled = true;
                    document.getElementById("guardarTarde").disabled = false;
                }
            })

        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @endauth
    @guest
        <div class="w-full grid items-center justify-center ">
            <h1 class="text-3xl font-bold text-center  mt-5">Inicia sesión para ver el contenido</h1>
            <a class="text-xl text-white font-bold text-center bg-[#AA983F] hover:bg-[#8c7e36] p-2 m-[10%] rounded focus:outline-none focus:shadow-outline "
                href="{{ route('proveicydet.login') }}">Inicia sesión</a>
        </div>




    @endguest











@endsection
