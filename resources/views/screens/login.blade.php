@extends('layout.layout')

@section('title', 'Registrate')

@section('content')

    <div id="father" class="flex items-center justify-center h-auto">
        <div id="wrapper"
            class="bg-white w-[90%] h-auto lg:w-[90%] lg:h-[90%] 2xl:h-[90%] rounded-br-large p-5 md:p-16 my-5">
            <h1 class="text-2xl 2xl:text-3xl font-bold lg:w-[35%] 2xl:w-[25%] pb-5">Registrate en la plataforma para
                participar</h1>
            <form action="{{ route('coveicydet.store') }}" method="post">
                @csrf
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="nombre">
                            Nombre(s)
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="nombre"
                            placeholder="Ingrese su(s) nombre(s)" />
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="apellidos">
                            Apellidos
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="apellidos"
                            placeholder="Ingrese sus apellidos" />
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="correo">
                            Email
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="email" name="correo"
                            placeholder="Ingrese su correo electronico" />
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="contrasena">
                            Contraseña
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="password" name="contrasena"
                            placeholder="Genere una contraseña" />
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="curp">
                            CURP
                        </label>
                        <input maxlength="18" class="inputsStyle focus:outline-none focus:shadow-outline" type="text"
                            name="curp" placeholder="Ingrese su CURP" />
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="fk_idEscolaridad">
                            Escolaridad
                        </label>
                        <select name="fk_idEscolaridad" class="inputsStyle focus:outline-none focus:shadow-outline">
                            <optgroup label="Seleccione su escolaridad">
                                @foreach ($escolaridades as $escolaridad)
                                    <option value="{{ $escolaridad->idEscolaridad }}">{{ $escolaridad->nombre }}</option>
                                @endforeach
                                <option>Prefiero no responder</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="sector">
                            Sector de la sociedad
                        </label>
                        <select name="sector"
                            class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">

                            <option>Selecciona su sector</option>
                            <optgroup label="Sector social">
                                <option>Sociedad civil</option>
                            </optgroup>

                            <optgroup label="Sector empresarial">
                                <option>Especificar</option>
                            </optgroup>
                            <optgroup label="Sector educativo">
                                <option>Universidad Veracruzana</option>
                                <option>Universidad Tecnlogica</option>
                                <option>Universidad Tecnlogica del Sureste de Vercruz</option>
                            </optgroup>


                        </select>

                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="fk_idSede">
                            Participacion presencial
                        </label>
                        <select name="fk_idSede"
                            class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            <option>Selecciona tu sede de Participacion</option>
                            <optgroup label="Sedes">
                                @foreach ($sedes as $sede)
                                    <option value="{{ $sede->idSede }}">{{ $sede->nombre }}</option>
                                @endforeach


                        </select>

                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <input type="checkbox" name="terminos" value="true" required>
                        <label>Aceptas los <a class="text-sky-800">terminos y condiciones</a></label>
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <button
                            class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Registrarme
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
