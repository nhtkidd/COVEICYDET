@extends('layout.layout')

@section('title', 'Actualizar Contraseña')

@section('content')
    <div class="flex items-center justify-center ">

        <div class="w-full lg:w-1/2 flex mt-[10%] lg:mt-1/2 lg:items-center justify-center ">

            
            <div class="bg-white w-[90%] h-auto lg:w-[70%] lg:h-[90%] 2xl:h-[65%] rounded-br-large">

                <body>
                    <div class="">
                        <h1 class="text-center text-2xl 2xl:text-4xl font-bold pt-3">Recuperar Contraseña</h1>
                        <br>
                        <p class="text-center px-8 py-3">Ingrese su correo electrónico</p>

                        <div class="my-4">
                            <form action="{{ route('proveicydet.cambiar') }}" method="POST" class="px-8">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input
                                    class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" type="email" placeholder="Email" name="email" value="{{old('email')}}" required>

                                @error("email")
                                    <br>
                                    <small class="text-red-800">*{{ $message }}</small>
                                @enderror

                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="password">
                                    Contraseña
                                </label>

                                <div class="flex">
                                    <div class="h-14 w-full">
                                        <input class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="password" type="password" placeholder="Contraseña" name="password" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[?!$%^&*-])(?!.*@).{8,32}$" title="Contraseña no valida. Requiere al menos un numero, una letra mayúscula, una minúscula y uno de los siguientes: ?!$%^&*- ">
                                    </div>
                                    <div class="flex-none w-14 h-14">
                                        <button class="bg-[#AA983F] hover:bg-[#998a47] inputsStyle mw-full mw-full flex justify-center items-center" type="button" onclick="mostrarContrasena()" ><svg xmlns="http://www.w3.org/2000/svg" class="w-[70%] h-[80%] " style="color: white" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg> </button>
                                    </div>
                                </div>

                                @error("password")
                                    <br>
                                    <small class="text-red-800">*{{ $message }}</small>
                                @enderror

                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="password-confirm">
                                    Confirmar contraseña
                                </label>
                                <input
                                    class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="password-confirm" type="password" placeholder="Confirmar contraseña" name="password_confirmation" required pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[?!$%^&*-])(?!.*@).{8,32}$" title="Contraseña no valida. Requiere al menos un numero, una letra mayúscula, una minúscula y uno de los siguientes: ?!$%^&*- ">

                                @error("password_confirmation")
                                    <br>
                                    <small class="text-red-800">*{{ $message }}</small>
                                @enderror
                                <br>
                                    <div class="flex justify-center items-center my-8">
                                        <button type="submit" class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold  py-2 px-4 rounded">Cambiar contraseña</button>
                                    </div>
                                </form>
                            </div>
                    </div>

                </body>
            </div>
    </div>
    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>

</div>
@endsection