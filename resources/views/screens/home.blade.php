@extends('layout.layout')

@section('title', 'PROVEICYDET')

@section('content')

    <div class="flex items-center justify-center ">

        <div class="flex items-center justify-center flex-col pb-10">

            <h5 class="font-bold text-xl md:text-3xl">Nuestro aviso de privacidad</h5>
            <div class="bg-white w-[90%] md:w-[60vw] h-auto my-5">
                <header class="bg-white w-auto h-28 flex justify-center items-center">
                    <img class=" h-[20%] md:h-[40%] " src="{{ URL('img/Header.png') }}">
                </header>

                <body>
                    <div class="text-center ">
                        <h5 class="font-bold p-3 ">AVISO DE PRIVACIDAD INTEGRAL DE LA CONVOCATORIA "FOROS DE CONSULTA CIUDADANA PARA LA FORMULACIÓN
                            DEL PROGRAMA VERACRUZANO DE
                            INVESTIGACIÓN CIENTÍFICA Y DESARROLLO TECNOLÓGICO (PROVEICYDET 2022-2024)”
                        </h5>
                        <br>
                        <p class="text-justify px-8 py-3">El Consejo Veracruzano de Investigación Científica y Desarrollo Tecnológico, con domicilio en
                            Avenida Murillo Vidal No. 1735, Col. Cuauhtémoc, C.P. 91069, y El Colegio de
                            Veracruz, con domicilio en Carrillo Puerto No. 26, Col. Centro, C.P. 91000, ambas direcciones en
                            la ciudad de Xalapa, Veracruz, son los responsables del tratamiento de los
                            datos personales que nos proporcione, los cuales serán protegidos conforme a lo dispuesto por la
                            Ley General de Transparencia y Acceso a la Información Pública, Ley 875
                            de Transparencia y Acceso a la Información para el Estado de Veracruz de Ignacio de la Llave,
                            Ley General de Datos Personales y Ley 316 de Protección de Datos Personales
                            en Posesión de Sujetos Obligados para el Estado de Veracruz de Ignacio de la Llave, y demás
                            normatividad que resulte aplicable.</p>
                            <br>
                            <div class="py-3">
                                <a class="text-blue-800 font-semibold " target="_blank"  href="{{URL('docs/Aviso de privacidad.pdf')}}">Consulta el aviso de privacidad aqui</a>
                            </div>
                         
                    </div>

                </body>
            </div>
            {{-- <iframe src="{{URL('docs/Aviso de privacidad.pdf')}}" class="w-[80%] h-[70vh] md:w-[70%] md:h-[70vh] py-7"></iframe> --}}

            <a href="{{ route('proveicydet.login') }}"
                class="px-6 py-2 w-auto h-auto bg-gold hover:bg-[#998b47] rounded-lg text-lg font-semibold text-white">Estoy
                de acuerdo con el aviso de privacidad</a>
        </div>

    </div>




@endsection