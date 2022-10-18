@extends('layout.layout-admin')

@section('title', 'Editar Usuario')

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
    {{--  --}}
    </div>
    @foreach ($usuario as $user) 
        <div id="father" class="flex items-center justify-center h-auto">
            <div class="wrapper bg-white w-full md:w-[80%] h-auto] mt-10 ">
                <section id="bienvenida" class="w-full h-auto md:h-[35%] lg:h-[50%]  p-[5%] text-center  ">
                    <h1 class="text-xl lg:text-4xl font-bold">Editar usuario</h1>
                </section>
                {{-- FORMULARIO --}}
                
                <form action="{{ route('proveicydet.admin.update',$user->idUser) }}" method="post" class=" p-[5%] mt-5 lg:mt-0  " name="form1">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                        <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="name">
                                Nombre(s)
                            </label>
                            <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="name"
                                value="@if ($user->name <> null && old('name') == null){{ $user->name }}@elseif(old('name') <> null){{old('name')}}@endif" placeholder="Ingrese su(s) nombre(s)" maxlength="50" required pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,50}" title="El campo no debe contener números o caracteres especiales"/>
                            @error('name')
                                <small class="text-red-800">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="md:ml-2 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="last_name">
                                Apellidos
                            </label>
                            <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="last_name"
                                value="@if ($user->last_name <> null && old('last_name') == null){{ $user->last_name }}@elseif(old('last_name') <> null){{old('last_name')}}@endif" placeholder="Ingrese sus apellidos" maxlength="50" required pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,200}" title="El campo no debe contener números o caracteres especiales."/>
                            @error('last_name')
                                <small class="text-red-800">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{--SEGUNDA FILA--}}
                    <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                        <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="email">
                                Email
                            </label>
                            <input class="inputsStyle focus:outline-none focus:shadow-outline" type="email" name="email"
                                value="@if ($user->email <> null && old('email') == null){{ $user->email }}@elseif(old('email') <> null){{old('email')}}@endif" placeholder="Ingrese su email" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,100}" title="Dirección de correo no valida."/>
                            @error('email')
                                <small class="text-red-800">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="md:ml-2 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="fk_idEducations">
                                Nivel de estudios
                            </label>
                            <select required name="fk_idEducations" class="inputsStyle focus:outline-none focus:shadow-outline" >
                                <option value="">Selecciona tu nivel de estudios</option>
                                <optgroup label="Escolaridad">
                                    @foreach ($escolaridades as $escolaridad)
                                        @if ($escolaridad->idEducations == $user->fk_idEducations)
                                        <option selected value="{{ $escolaridad->idEducations }}">{{ $escolaridad->name }}</option>
                                        @else
                                            <option {{ old('fk_idEducations') == $escolaridad->idEducations ? 'selected' : '' }} value="{{ $escolaridad->idEducations }}">{{ $escolaridad->name }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    {{--TERCERA FILA
                    <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                        <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="sector">
                                Sector de la sociedad
                            </label>
                            <select required name="sector" onchange="selectSector()" id="sectorSelected" 
                                class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" selected>Selecciona su sector</option>
                                <optgroup label="Sector social">
                                    <option value="Sociedad civil"  {{ old('sector') == 'Sociedad civil' ? 'selected' : '' }}>Sociedad civil</option>
                                    <option value="otros" >Sector empresarial</option>
                                    <option value="otros">Sector gubernamental</option>
                                </optgroup>
                                <optgroup label="Sector educativo">
                                    @foreach ($sectores as $sectorEdu)
                                    <option value="{{$sectorEdu->name}}" {{ old('sector') == $sectorEdu->name ? 'selected' : '' }}>{{$sectorEdu->name}}</option>
                                    @endforeach
                                    <option value="otros">Institución de educación particular</option>
                                </optgroup>
                            </select>
                        </div>
                        <div id="hiddenInput" class="md:ml-2 2xl:my-4 hidden">
                            <label class="labelStyle 2xl:text-xl" for="sector">
                                Especifica cual
                            </label>
                            <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="sector" required
                                disabled id="sectorInput" placeholder="Ingresa tu sector" pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,200}" title="El campo no debe contener números o caracteres especiales." />
                            @error('sector')
                                <small class="text-red-800">*{{ $message }}</small>
                            @enderror
                        </div>
    
                    </div>--}}
                    {{--CUARTA FILA--}}
                    
                    {{--QUINTA FILA--}}
                    <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                        <div class="mb-4 md:mr-2 md:mb-0 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="sector">
                                Participación
                            </label>

                            @if ($user->participation == 1)
                                <input  type="radio" id="participacionSi" name="participation" value="1" required
                                    onchange="participaSelector()" checked>
                                <label for="participacionSi">Si</label><br>
                                <input  type="radio" id="participacionSi" name="participation" value="0" required
                                onchange="participaSelector()">
                                <label for="participacionSi">No</label><br>
                            @else
                            <input  type="radio" id="participacionSi" name="participation" value="1" required
                                onchange="participaSelector()">
                                <label for="participacionSi">Si</label><br>
                                <input type="radio"  id="participacionNo" name="participation" value="0" required
                                    onchange="participaSelector()" checked>
                                <label for="participacionNo">No</label><br>
                            @endif
                        </div>
                        <div id="sedeSelect" class="md:ml-2 2xl:my-4" hidden>
                            <div class="md:ml-2 2xl:my-4">
                                <label class="labelStyle 2xl:text-xl" for="fk_idHeadquarters">
                                    Participacion presencial
                                </label>
                                <select id="selectSede" name="fk_idHeadquarters" value=""  disabled 
                                    class="shadow  border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required  title="Dale pa">
                                    <option value="" selected>Seleccione su sede</option>
                                    <optgroup label="Sedes">
                                        @foreach ($sedes as $sede)
                                            <option value="{{ $sede->idHeadquarters }}">{{ $sede->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mb-4 md:grid md:grid-cols-2 md:gap-4">
                        <div class="md:ml-2 2xl:my-4">
                            <button onclick="return confirm(¿Estas seguro de guardar estos cambios?)"
                                class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Guardar cambios
                            </button>
                        </div>
    
                    </div>
                </form>
            </div>
        </div>
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
                if (cb.checked) {
                    document.getElementById("sedeSelect").classList.add('bg-green-200');
                    document.getElementById("sedeSelect").hidden = false;
                    document.getElementById("selectSede").disabled = false;
                } else {
                    document.getElementById("sedeSelect").hidden = true;
                    document.getElementById("sedeSelect").value = "Selecciona tu sede de Participacion";
                    document.getElementById("sedeSelect").classList.remove('bg-green-200');

                }
            }
        </script>
    @endauth
    @guest
        <div class="w-full grid items-center justify-center ">
            <h1 class="text-3xl font-bold text-center  mt-5">Inicia sesión para ver el contenido</h1>
            <a class="text-xl text-white font-bold text-center bg-[#AA983F] hover:bg-[#8c7e36] p-2 m-[10%] rounded focus:outline-none focus:shadow-outline "
                href="{{ route('proveicydet.login') }}">Inicia sesión</a>
        </div>




    @endguest











@endsection
