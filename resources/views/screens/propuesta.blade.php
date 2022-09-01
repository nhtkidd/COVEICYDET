@extends('layout.layout')

@section('title', 'Propuesta')

@section('content')

    <div id="father" class="flex items-center justify-center h-auto">
        <div class="wrapper bg-white w-full md:w-[80%] h-auto] mt-10 ">
            <section id="bienvenida" class="w-full h-[40vh] md:h-[35%] lg:h-[50%]  p-[5%] text-center  ">
                <h1 class="text-xl lg:text-4xl font-bold">Gracias por tu interes en participar con tu propuesta.</h1>
                <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">
                    Es importante que tomes en cuenta la siguiente pregunta, que te ayudará a formular la propuesta:</h2>
                <div class="bg-spaceGray w-full h-[20vh] mt-[5%] p-5">
                    <h3 class="text-sm lg:text-xl 2xl:text-2xl p-3 2xl:p-[4%] ">
                        ¿Qué proyectos o acciones de desarrollo tecnológico, científico e innovación consideras que debe
                        implementar o promover el Gobierno del Estado de Veracruz para solucionar los problemas
                        prioritarios nacionales y estatales?
                    </h3>
                </div>
            </section>
            {{-- FORMULARIO --}}
            <form action="{{ route('coveicydet.propuesta.store') }}" method="post" class=" p-[5%] mt-5 lg:mt-0  ">
                @csrf
                <div class="my-3">
                    <label class="labelStyle 2xl:text-xl" >
                        1._ Para iniciar, deberás elegir qué área buscas atender con tu propuesta
                    </label>
                    <select name="area" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">
                        <option value="">Seleccione el area</option>
                        <option>Ambiental</option>
                        <option>Social</option>
                        <option>Ecólogico</option>
                        <option>Tecnológico</option>
                    </select>
                </div>
                <div class="my-3">
                    <label class="labelStyle 2xl:text-xl">
                        2._ Selecciona el problema prioritario que atenderá tu propuesta
                    </label>
                    <div class="bg-spaceGray w-full h-[30vh]">

                    </div>
                </div>
                <div class="my-3">
                    <label class="labelStyle 2xl:text-xl">
                        3._ Registra los siguientes datos que se te solicitan
                    </label>
                    <label class="labelStyle 2xl:text-xl">
                        &nbsp; Nombre de la propuesta

                    </label>
                    <input class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline" type="text"
                        name="nombrePropuesta" placeholder="Ingresa el nombre de tu propuesa" />
                        <label class="labelStyle 2xl:text-xl">
                        &nbsp; Objetivo de la propuesta

                    </label>
                    <textarea name="objetivoPropuesta" id="" rows="10" cols="45"placeholder="Maximo 500 caracteres"
                        maxlength="500"
                        class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline"></textarea>
                        <label class="labelStyle 2xl:text-xl">
                        &nbsp; Descripción actual de la problemática

                    </label>
                    <textarea name="descripcionPropuesta" id="" rows="10" cols="45" placeholder="Maximo 2500 caracteres"
                        maxlength="2500"
                        class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline"></textarea>
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
                    <textarea name="grupoImpacto" id="" rows="10" cols="45" placeholder="Maximo 2500 caracteres"
                        maxlength="2500"
                        class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline"></textarea>
                        <label class="labelStyle 2xl:text-xl">
                        &nbsp; Lugar o región de impacto (espacio físico):
                    </label>
                    <select name="lugarImpacto"
                    class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">
                        <option value="">Seleccione la region</option>
                        <option>1.- Huasteca alta</option>
                        <option>1.- Huasteca baja</option>
                        <option>3.- Totonaca</option>
                        <option>4.- Nautla</option>
                    </select>
                    <label class="labelStyle 2xl:text-xl">
                        &nbsp; ¿Qué esperas lograr con tu propuesta?

                    </label>
                    <textarea name="queEsperas" id="" rows="10" cols="45" placeholder="Maximo 2500 caracteres"
                        maxlength="2500"
                        class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline"></textarea>

                    {{-- AQUI VAN LOS CHECKBOXES --}}
                    <label class="labelStyle 2xl:text-xl md:w-[60%]" for="firstName">
                        &nbsp; De acuerdo con la naturaleza de tu
                        propuesta, selecciona el o los objetivos
                        de Desarrollo Sostenible que impacta

                    </label>
                    <span class="block mb-2 text-sm font-thin text-gray-700 2xl:text-xl md:w-[60%]">
                        Podrás elegir como máximo 5 opciones</span>
                    <div class="md:w-[60%] flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                        <input id="bordered-checkbox-1" type="checkbox" value="Fin de la pobreza" name="ods[]"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-1"
                            class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">1.-Fin de la
                            pobreza
                        </label>
                    </div>
                    <div class=" md:w-[60%] flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                        <input id="bordered-checkbox-2" type="checkbox" value="Hambre cero" name="ods[]"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-2"
                            class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">2.- Hambre cero
                        </label>
                    </div>
                    <div class=" md:w-[60%] flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                        <input id="bordered-checkbox-3" type="checkbox" value="Salud y bienestar" name="ods[]"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-3"
                            class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">3.- Salud y
                            bienestar
                        </label>
                    </div>
                    <div class=" md:w-[60%] flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                        <input id="bordered-checkbox-4" type="checkbox" value="Educación de calidad" name="ods[]"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-4"
                            class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">4.- Educación de
                            calidad
                        </label>
                    </div>
                    {{-- BOTON SUBMIT --}}
                    <div class="my-5">
                        <button
                            class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Guardar para mas tarde
                        </button>
                        <div class="py-5">
                            <input type="checkbox" name="finished" value="true">
                            <label>He terminado la propuesta (Una vez terminada, ya no podrás modificarla.)</label>

                        </div>
                        <button
                            class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Enviar propuesta
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection
