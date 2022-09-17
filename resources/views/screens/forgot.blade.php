@extends('layout.layout')

@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="flex items-center justify-center ">

        <div class="w-full lg:w-1/2 flex mt-[10%] lg:mt-1/2 lg:items-center justify-center ">
            
            <div class="bg-white w-[90%] h-auto lg:w-[70%] lg:h-[90%] 2xl:h-[65%] rounded-br-large">

                <body>
                    @if(session()->has('success'))
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="font-bold">Email enviado</p>
                            <p class="text-sm">{{ session()->get('success') }}</p>
                        </div>
                    @endif
                    <div class="text-center ">
                        <h1 class="text-2xl 2xl:text-4xl font-bold">Recuperar Contraseña</h1>
                        <br>
                        <p class="text-center px-8 py-3">Ingrese su correo electrónico</p>

                        <div class="my-4">
                            <form action="{{ route('proveicydet.enlace') }}" method="POST">
                                @csrf
                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-[80%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" type="email" placeholder="Email" name="email" required>

                                @error("email")
                                    <br>
                                    <small class="text-red-800">*{{ $message }}</small>
                                @enderror
                                <br>
                                    <div class="py-3">
                                        <br>
                                        <button type="submit" class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold  py-2 px-4 rounded">Enviar</button>
                                    </div>
                                </form>
                            </div>
                     
                    </div>

                </body>
            </div>
    </div>

</div>
@endsection