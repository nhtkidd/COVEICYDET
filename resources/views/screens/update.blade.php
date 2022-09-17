@extends('layout.layout')

@section('title', 'Actualizar Contraseña')

@section('content')
    <div class="flex items-center justify-center ">

        <div class="w-full lg:w-1/2 flex mt-[10%] lg:mt-1/2 lg:items-center justify-center ">

            
            <div class="bg-white w-[90%] h-auto lg:w-[70%] lg:h-[90%] 2xl:h-[65%] rounded-br-large">

                <body>
                    <div class="text-center ">
                        <h1 class="text-2xl 2xl:text-4xl font-bold">Recuperar Contraseña</h1>
                        <br>
                        <p class="text-center px-8 py-3">Ingrese su correo electrónico</p>

                        <div class="my-4">
                            <form action="{{ route('proveicydet.cambiar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-[80%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="email" type="email" placeholder="Email" name="email" value="{{old('email')}}" required>

                                @error("email")
                                    <br>
                                    <small class="text-red-800">*{{ $message }}</small>
                                @enderror

                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="password">
                                    Contraseña
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-[80%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="password" type="password" placeholder="Contraseña" name="password" required>

                                @error("password")
                                    <br>
                                    <small class="text-red-800">*{{ $message }}</small>
                                @enderror

                                <label class="block text-gray-700 text-sm 2xl:text-xl font-bold mb-2" for="password-confirm">
                                    Confirmar contraseña
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-[80%] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="password-confirm" type="password" placeholder="Confirmar contraseña" name="password_confirmation" required>

                                @error("password_confirmation")
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
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                    </div>

                </body>
            </div>
    </div>

</div>
@endsection