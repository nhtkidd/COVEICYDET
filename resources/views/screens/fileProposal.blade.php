@extends('layout.layout')

@section('title', 'PROVEICYDET')

@section('content')

    @auth
        <div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">

            <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
            <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
        </div>
        <div id="father" class="flex items-center justify-center h-auto">
            <div class="wrapper bg-white w-full md:w-[40%] h-auto] mt-10 ">

                <section id="bienvenida" class="w-full h-[60vh] md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
                    <h1 class="text-xl lg:text-4xl font-bold">{{ $nameProposal }}</h1>

                    <div class="w-75 h-auto mt-5">
                        <h4>Por favor, sube el archivo PDF de tu propuesta.</h4>
                        <form action="{{ route('proveicydet.storePresentation') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <input type="text" hidden  value="{{$id}}" name="idProposal">
                                <div class="flex justify-center items-center w-full mt-2">
                                    <label for="dropzone-file"
                                        class="flex flex-col justify-center items-center w-full h-64 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:border-gray-600 dark:hover:border-gray-500">
                                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click
                                                    para subir</span></p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SUBE TU PDF (MAX. 10MB)
                                            </p>
                                        </div>
                                        <input accept=".pdf" type="file" name="file" placeholder="Choose file" id="dropzone-file">
                                        @error('file')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </label>
                                </div>

                                <button
                                    class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Subir
                                </button>

                            </form>


                    </div>

                </section>
            </div>
        </div>


        </div>
    @endauth
    @guest
        <div class="w-full grid items-center justify-center ">
            <h1 class="text-3xl font-bold text-center  mt-5">Inicia sesión para ver el contenido</h1>
            <a class="text-xl text-white font-bold text-center bg-[#AA983F] hover:bg-[#8c7e36] p-2 m-[10%] rounded focus:outline-none focus:shadow-outline "
                href="{{ route('proveicydet.login') }}">Inicia sesión</a>
        </div>




    @endguest
@endsection
