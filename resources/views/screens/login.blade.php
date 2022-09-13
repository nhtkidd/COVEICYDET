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
                        <input
                            class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="****" name="password" required>
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