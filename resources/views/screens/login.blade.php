@extends('layout.layout')

@section('title', 'Registrate')

@section('content')

    <div id="father" class="flex items-center justify-center h-auto">
        <div id="wrapper" class="bg-white w-[90%] h-auto lg:w-[90%] lg:h-[90%] 2xl:h-[90%] rounded-br-large p-5 md:p-16 my-5">
            <h1 class="text-2xl 2xl:text-3xl font-bold lg:w-[35%] 2xl:w-[25%] pb-5">Registrate en la plataforma para participar</h1>
            <form action="{{ route('coveicydet.store') }}" method="post">
                @csrf
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="firstName">
                            Nombre(s)
                        </label>
                        <input
                            class="inputsStyle focus:outline-none focus:shadow-outline"
                            type="text" name="nommbre" placeholder="Ingrese su(s) nombre(s)" />
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="lastName">
                            Apellidos
                        </label>
                        <input
                            class="inputsStyle focus:outline-none focus:shadow-outline"
                            type="text" name="apellidos" placeholder="Ingrese sus apellidos" />
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="firstName">
                            Email
                        </label>
                        <input
                            class="inputsStyle focus:outline-none focus:shadow-outline"
                            type="email" name="email" placeholder="Ingrese su correo electronico" />
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="lastName">
                            Contraseña
                        </label>
                        <input
                            class="inputsStyle focus:outline-none focus:shadow-outline"
                            type="password" name="password" placeholder="Genere una contrase;a" />
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="firstName">
                            CURP
                        </label>
                        <input
                            class="inputsStyle focus:outline-none focus:shadow-outline"
                            type="text" name="curp" placeholder="Ingrese su CURP" />
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="lastName">
                            Escolaridad
                        </label>
                        <select name="escolaridad"
                            class="inputsStyle focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione su escolaridad</option>
                            <option>Secundaria</option>
                            <option>Preparatoria</option>
                            <option>Licenciatura</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl">
                            Sector de la sociedad
                        </label>
                        <select name="sector"
                            class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione su escolaridad</option>
                            <option>Sociedad civil</option>
                            <option>Sector empresarial</option>
                            <option>Sector educativo</option>
                        </select>

                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="lastName">
                            Participacion presencial
                        </label>
                        <select name="participacion"
                            class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione su escolaridad</option>
                            <option>ITSPR</option>
                            <option>UTSV</option>
                            <option>ITSMT</option>
                        </select>

                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <input type="checkbox" name="terminos" value="true" required>
                        <label>Aceptas los <a class="text-sky-800" href="">terminos y condiciones</a></label>
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <button
                            class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Iniciar sesión
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
