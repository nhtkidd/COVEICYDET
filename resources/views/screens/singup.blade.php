@extends('layout.layout')

@section('title', 'Registrate')

@section('content')

    <div id="father" class="flex items-center justify-center h-auto">
        <div id="wrapper"
            class="bg-white w-[90%] h-auto lg:w-[90%] lg:h-[90%] 2xl:h-[90%] rounded-br-large p-5 md:p-16 my-5">
            @error('message')
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">Error</p>
                    <p>{{ $message }}</p>
                </div>
            @enderror
            <h1 class="text-2xl 2xl:text-3xl font-bold lg:w-[35%] 2xl:w-[25%] pb-5">Registrate en la plataforma para
                participar</h1>
            <form action="{{ route('proveicydet.store') }}" method="post">
                @csrf
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="name">
                            Nombre(s)
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="name"
                            value="{{ old('name') }}" placeholder="Ingrese su(s) nombre(s)" />
                        @error('name')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="last_name">
                            Apellidos
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="last_name"
                            value="{{ old('last_name') }}" placeholder="Ingrese sus apellidos" />
                        @error('last_name')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="email">
                            Email
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="email" name="email"
                            value="{{ old('email') }}" placeholder="Ingrese su email electronico" />
                        @error('email')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="password">
                            Contraseña
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="password" name="password" minlength="8"
                            value="{{ old('password') }}" placeholder="Genere una contraseña de al menos 8 caracteres" />
                        @error('password')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="curp">
                            CURP
                        </label>
                        <input style="text-transform: uppercase;" minlength="18" maxlength="18"
                            class="inputsStyle focus:outline-none focus:shadow-outline" type="text"
                            value="{{ old('curp') }}" name="curp" placeholder="Ingrese su CURP"  required/>
                        @error('curp')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="fk_idEducations">
                            Escolaridad
                        </label>
                        <select required name="fk_idEducations" class="inputsStyle focus:outline-none focus:shadow-outline" >
                            <option value="">Selecciona tu escolaridad</option>
                            <optgroup label="Escolaridad">
                                @foreach ($escolaridades as $escolaridad)
                                    <option value="{{ $escolaridad->idEducations }}">{{ $escolaridad->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="sector">
                            Sector de la sociedad
                        </label>
                        <select required name="sector" onchange="selectSector()" id="sectorSelected" 
                            class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" selected>Selecciona su sector</option>
                            <optgroup label="Sector social">
                                <option value="2">Sociedad civil</option>
                            </optgroup>
                            <optgroup label="Sector empresarial">
                                <option value="otros">Especificar</option>
                            </optgroup>
                            <optgroup label="Sector gubernamental">
                                <option value="otros">Especificar</option>
                            </optgroup>
                            <optgroup label="Sector educativo">
                                @foreach ($sectores as $sectorEdu)
                                <option value="{{$sectorEdu->name}}">{{$sectorEdu->name}}</option>
                                @endforeach
                                <option value="otros">Otra opción</option>
                            </optgroup>
                        </select>
                    </div>
                    <div id="hiddenInput" class="md:ml-2 2xl:my-4 hidden">
                        <label class="labelStyle 2xl:text-xl" for="sector">
                            Especifica tu sector
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="sector"
                            disabled id="sectorInput" value="{{ old('sector') }}" placeholder="Ingresa tu sector" />
                        @error('sector')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="sector">
                            ¿Tu participación será presencial?
                        </label>
                        <input type="radio" id="participacionSi" name="participation" value="si" required
                            onchange="participaSelector()">
                        <label for="si">Si</label><br>
                        <input type="radio"  id="participacionNo" name="participation" value="no" required
                            onchange="participaSelector()">
                        <label for="no">No</label><br>
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <div class="md:ml-2 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="fk_idHeadquarters">
                                Participacion presencial
                            </label>
                            <select name="fk_idHeadquarters" value="" id="sedeSelect" required disabled
                                class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                                <option>Selecciona tu sede de Participacion</option>
                                <optgroup label="Sedes">
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->idHeadquarters }}">{{ $sede->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                    <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                        <input type="checkbox" name="conditions" value="true" required>
                        <label>Aceptas los <a class="text-sky-800" href="{{URL('docs/Aviso de privacidad.pdf')}}">terminos y condiciones</a></label>
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



<script>
    function selectSector() {
        d = document.getElementById("sectorSelected").value;
        var disabled = document.getElementById("sectorInput").disabled;
        if (d == "otros") {
            document.getElementById("sectorInput").disabled = false;
            document.getElementById("sectorInput").classList.add('bg-green-200');
            document.getElementById("hiddenInput").classList.remove('hidden');
            document.getElementById("hiddenInput").classList.add('none');


        } else {
            document.getElementById("sectorInput").disabled = true;
            document.getElementById("sectorInput").value = "";
            document.getElementById("sectorInput").classList.remove('bg-green-200');
            document.getElementById("hiddenInput").classList.add('hidden');
        }

    };

    function participaSelector() {
        const cb = document.querySelector('#participacionSi');
        console.log(cb.checked); //
        if (cb.checked) {
            document.getElementById("sedeSelect").disabled = false;
            document.getElementById("sedeSelect").classList.add('bg-green-200');
        } else {
            console.log('pendejote')
            document.getElementById("sedeSelect").disabled = true;
            document.getElementById("sedeSelect").value = "Selecciona tu sede de Participacion";
            document.getElementById("sedeSelect").classList.remove('bg-green-200');
        }
    }
</script>
