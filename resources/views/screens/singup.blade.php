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
                            value="{{ old('name') }}" placeholder="Ingrese su(s) nombre(s)" maxlength="50" required pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,50}" title="El campo no debe contener números o caracteres especiales"/>
                        @error('name')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="last_name">
                            Apellidos
                        </label>
                        <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="last_name"
                            value="{{ old('last_name') }}" placeholder="Ingrese sus apellidos" maxlength="50" required pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,200}" title="El campo no debe contener números o caracteres especiales."/>
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
                            value="{{ old('email') }}" placeholder="Ingrese su email" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,100}" title="Dirección de correo no valida."/>
                        @error('email')
                            <small class="text-red-800">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="md:ml-2 2xl:my-4">
                        <label class="labelStyle 2xl:text-xl" for="password">
                            Contraseña
                        </label>
                        <div class="flex">
                            <div class="grow h-14 ">
                                <input id="password" class="inputsStyle focus:outline-none focus:shadow-outline flex-none" type="password" name="password" minlength="8" maxlength="16"
                                value="{{ old('password') }}" placeholder="Genere una contraseña de al menos 8 caracteres"required   title="Contraseña no valida."/>
                              </div>
                              <div class="flex-none w-14 h-14 ">
                                <button class="bg-[#AA983F] hover:bg-[#998a47] inputsStyle mw-full mw-full flex justify-center items-center" type="button" onclick="mostrarContrasena()" ><svg xmlns="http://www.w3.org/2000/svg" class="w-[70%] h-[80%] " style="color: white" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg> </button>
                              </div>
                        </div>
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
                            value="{{ old('curp') }}" name="curp" placeholder="Ingrese su CURP"  required pattern="(^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)){1,200}" title="El campo no coincide con el formato de CURP"/>
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
                                <option value="Sociedad civil">Sociedad civil</option>
                                <option value="otros">Sector empresarial</option>
                                <option value="otros">Sector gubernamental</option>
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
                            disabled id="sectorInput" value="{{ old('sector') }}" placeholder="Ingresa tu sector" pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ ]{1,200}" title="El campo no debe contener números o caracteres especiales." />
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
                        <input  type="radio" id="participacionSi" name="participation" value="true" required
                            onchange="participaSelector()">
                        <label for="participacionSi">Si</label><br>
                        <input type="radio"  id="participacionNo" name="participation" value="false" required
                            onchange="participaSelector()">
                        <label for="participacionNo">No</label><br>
                    </div>
                    
              
                    <div id="sedeSelect" class="md:ml-2 2xl:my-4" hidden>
                        <div class="md:ml-2 2xl:my-4">
                            <label class="labelStyle 2xl:text-xl" for="fk_idHeadquarters">
                                Participacion presencial
                            </label>
                            <select required id="selectSede" name="fk_idHeadquarters" value=""  disabled 
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

     function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
