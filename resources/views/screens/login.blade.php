@extends('layout.layout')

@section('title', 'Inicia sesión')

@section('content')

    <div id="wrapper" class="flex flex-wrap w-screen ">
        <div id="1" class="w-full hidden lg:flex items-center justify-center lg:w-1/2 lg:h-[100vh-176px] "
            style="height: calc(100vh -  176px )">
            <img class=" pt-4 pb-10  h-auto md:w-[40%] lg:w-[64%] "  src="{{ URL('img/Consulta.jpg') }}">
            {{-- <h1 class="text-3xl 2xl:text-5xl font-bold p-[20%]">Inicia sesión en la plataforma
                para participar.
            </h1> --}}
        </div>
        <div id="2" class="w-full lg:w-1/2 flex mt-[10%] lg:mt-0 lg:items-center justify-center "
         >
         
            <div class="bg-white w-[90%] h-auto lg:w-[70%] lg:h-[90%] 2xl:h-[65%] rounded-br-large">
                @if(session()->has('success'))
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="text-sm">{{ session()->get('success') }}</p>
                        </div>
                    @endif
                <form action="{{ route('proveicydet.compare') }}" method="post" class="p-10">
                    @csrf
                    <h1 class="text-2xl 2xl:text-4xl font-bold">Inicia sesión</h1>
                    <div class="my-4">
                        <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" placeholder="Email" name="email" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="password">
                            Password
                        </label>
                        <div class="flex">
                            <div class="grow h-14 ">
                                <input
                            class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="****" name="password" minlength="8" maxlength="16" required>
                            </div>
                            <div class="flex-none w-14 h-14 ">
                                <button class="bg-[#AA983F] hover:bg-[#998a47] inputsStyle mw-full mw-full flex justify-center items-center" type="button" onclick="mostrarContrasena()" ><svg xmlns="http://www.w3.org/2000/svg" class="w-[70%] h-[80%] " style="color: white" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg> </button>
                            </div>
                        </div>
                       
                        @error('message')
                          <small class="text-red-800">Email o contraseña incorrecta</small><br>
                        @enderror
                        <a href="{{ route('proveicydet.email') }}" class="text-stone-500 hover:text-stone-800 2xl:text-lg">¿Olvidaste la
                            contraseña?</a>
                    </div>

                    <div class="mb-3">
                        <button
                            class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Iniciar sesión
                        </button>
                    </div>
                    <div class="mb-6">
                        <label class="block text-stone-500 mb-2 2xl:text-lg">
                            ¿No estás registrado?
                        </label>
                        <a href="{{ route('proveicydet.singup') }}"
                            class="bg-[#AA983F] hover:bg-[#8c7e36] text-center text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Registrate
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

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