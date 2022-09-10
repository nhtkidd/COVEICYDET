@extends('layout.layout')

@section('title', 'PROVEICYDET')

@section('content')

    <div class="flex items-center justify-center ">

           <div  class="flex items-center justify-center flex-col pb-10">
            <img class=" pt-4 pb-10 w-[70%] h-[40%] md:w-[40%] "  src="{{ URL('img/Consulta.jpg') }}">
            <h5 class="font-bold text-xl md:text-3xl">Nuestro aviso de privacidad</h5>  
            <iframe src="{{URL('docs/Aviso de privacidad.pdf')}}" class="w-[80%] h-[70vh] md:w-[70%] md:h-[70vh] py-7"></iframe>

            <a href="{{route('proveicydet.login')}}" class="px-6 py-2 w-auto h-auto bg-gold hover:bg-[#998b47] rounded-lg text-lg font-semibold text-white">Estoy de acuerdo con el aviso de privacidad</a> 
           </div>
              
    </div>




@endsection