@extends('layout.layout')

@section('title', 'Editar Propuesta')

@section('content')

    @auth
            <div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
                <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
                <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
            </div>
        <div id="father" class="flex items-center justify-center h-auto">
            <div class="wrapper bg-white w-full md:w-[80%] h-auto] mt-10 ">
                <section id="bienvenida" class="w-full h-auto md:h-[35%] lg:h-[50%]  p-[5%] text-center  ">
                    @error(count($errors)>0)
                    @foreach ($errors->all() as $error)
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">Error</p>
                        <p>{{ $error }}</p>
                    </div>
                    @endforeach
                        
                    @enderror
                    @error('message')
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                        @foreach ($propuesta as $data)
                        @php
                        $objetivos = $data->fk_idOds ;
                        $datos= explode(',',$objetivos) ;
                        $count = sizeOf($datos);
                        $odsOne = null;
                        $odsTwo = null;
                        $odsThree = null;
                        $odsFour = null;
                        $odsFive = null; 
                        $lugarImpacto = null;
                        ;
                        for ($i=0; $i <= $count-1 ; $i++) { 
                            if ($i == 0) {
                                $odsOne = $datos[$i];
                            }
                            if ($i == 1) {
                                $odsTwo = $datos[$i];
                            }
                            if ($i == 2) {
                                $odsThree = $datos[$i];
                            }
                            if ($i == 3) {
                                $odsFour = $datos[$i];
                            }
                            if ($i == 4) {
                                $odsFive = $datos[$i];
                            }
                        }
                        //echo $odsOne."-".$odsTwo."-".$odsThree."-".$odsFour."-".$odsFive;
                        @endphp
                    <h1 class="text-xl lg:text-4xl font-bold">Gracias por tu interes en participar con tu propuesta.</h1>
                    <h2 class="text-lg lg:text-xl 2xl:text-2xl  pt-6 px-[10%] 2xl:px-[15%]">
                        Es importante que tomes en cuenta la siguiente pregunta, que te ayudará a formular la propuesta:
                    </h2>
                    <div class="bg-spaceGray w-full h-auto mt-[5%] p-5">
                        <h3 class="text-sm lg:text-xl 2xl:text-2xl p-3 2xl:p-[4%] ">
                            ¿Qué proyectos o acciones de desarrollo tecnológico, científico e innovación consideras que debe
                            implementar o promover el Gobierno del Estado de Veracruz para solucionar los problemas
                            prioritarios nacionales y estatales?
                        </h3>
                    </div>
                </section>
                {{-- FORMULARIO --}}
                <form action="{{ route('proveicydet.propuesta.update', $data->idProposal) }}" method="post" class=" p-[5%] mt-5 lg:mt-0  " name="form1">
                    @csrf
                    @method('PUT')
                    <div class="my-3">
                        <label class="labelStyle 2xl:text-xl">
                            1._ Para iniciar, deberás elegir qué área buscas atender con tu propuesta
                        </label>
                        <input type="radio" name="area" id="primero" value="Ambiental" @if ("Ambiental" == $data->area) checked @endif ><label for="primero"> Ambiental</label><br>
                        <input type="radio" name="area" id="segundo" value="Social" @if ("Social" == $data->area) checked @endif><label for="segundo"> Social</label><br>
                        <input type="radio" name="area" id="tercero" value="Económico" @if ("Económico" == $data->area) checked @endif><label for="tercero"> Economico</label><br>
                        <input type="radio" name="area" id="cuarto" value="Tecnológico" @if ("Tecnológico" == $data->area) checked @endif><label for="cuarto"> Tecnológico</label><br>
                    </div>
                    
                    <div class="my-3">
                        <label class="labelStyle 2xl:text-xl">
                            2._ Selecciona el problema prioritario que atenderá tu propuesta
                        </label>
                        <input type="hidden" name="annexes" value="{{ $data->fk_idAnnexe }}">
                        <div class="bg-spaceGray w-full h-[30vh] overflow-y-auto" id="resultados">
                            <!-- MOSTRAR ANEXO GUARDADO ANERIORMENTE -->
                            
                            @foreach ($annexes as $annexe)
                            @if ($annexe->idAnnexes == $data->fk_idAnnexe)
                                <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                    <input checked id="bordered-radio-1" type="radio" value="{{ $annexe->idAnnexes }}" name="annexes"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1"
                                    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                                    {{ $annexe->problematic }}
                                    </label>
                                </div>
                            @endif
                            
                            @endforeach
                            <!-- M O S T R A R - A N E X O S -->
                            

                        </div>
                    </div>
                    
                    <script type="text/javascript">
                        const area = document.getElementById('primero');
                        const areados = document.getElementById('segundo');
                        const areatres = document.getElementById('tercero');
                        const areacuatro = document.getElementById('cuarto');
                        const resultado = document.getElementById('resultados');

                        area.addEventListener('click',()=>{
                            const elemento = `
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="1" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-2" type="radio" value="2" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-5" type="radio" value="5" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-5"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Atender la vulnerabilidad ante el cambio climático, el fortalecimiento de la resiliencia y las capacidad humana e institucional de adaptación, mitigación y reconstrucción.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye reducir el riesgo de desastres y la respuesta y atención de las emergencias y desastres provocados por el cambio climático, fenómenos naturales o actividades humanas, para disminuir su impacto y promover la reconstrucción.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-6" type="radio" value="6" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-6"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Uso de tecnologías bajas en carbono y fuentes de generación de energía renovable que promuevan la reducción de la emisión de contaminantes a la atmosfera, el suelo y el agua.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-7" type="radio" value="7" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-7"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Regionalización para la atención de problemas públicos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-8" type="radio" value="8" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-8"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejora del ordenamiento territorial y ecológico de los asentamientos humanos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-11" type="radio" value="11" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-11"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Problemáticas vinculadas a la migración.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-13" type="radio" value="13" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-13"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejorar el equipamiento de los espacios educativos 
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-14" type="radio" value="14" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-14"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-15" type="radio" value="15" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-15"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejorar y ampliar el equipamiento de salud y rehabilitación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-17" type="radio" value="17" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-17"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover la vigilancia y supervisión ambiental eficaz, eficiente, transparente y participativa para prevenir y controlar la contaminación y la degradación ambiental.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye temas de agua, suelo, aire, ruido, etc.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-18" type="radio" value="18" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-18"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Impulso a la movilidad accesible y sostenible priorizando los modos de transporte público eficientes y bajos en emisiones, así como la movilidad no motorizada.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-23" type="radio" value="23" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-23"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-24" type="radio" value="24" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-24"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-25" type="radio" value="25" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-25"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
            </label>
                
    </div>

`;
                            resultado.innerHTML = elemento;
                        })

                        areados.addEventListener('click',()=>{
                            const elementodos = `
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="1" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-2" type="radio" value="2" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-3" type="radio" value="3" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-3"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                El desarrollo de medidas especiales para lograr la igualdad sustantiva, nivelación y/o protección especial a grupos y regiones marginadas o vulnerables.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Los grupos pueden incluir personas, organizaciones, instituciones, municipios e incluso regiones.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-4" type="radio" value="4" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-4"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                El aprovechamiento sustentable y conservación de los recursos naturales, áreas naturales protegidas y sitios RAMSAR a través de la innovación.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la conservación y protección de los ecosistemas terrestres y acuáticos, así́ como la biodiversidad para garantizar la provisión y calidad de sus servicios ambientales.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-5" type="radio" value="5" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-5"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Atender la vulnerabilidad ante el cambio climático, el fortalecimiento de la resiliencia y las capacidad humana e institucional de adaptación, mitigación y reconstrucción.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye reducir el riesgo de desastres y la respuesta y atención de las emergencias y desastres provocados por el cambio climático, fenómenos naturales o actividades humanas, para disminuir su impacto y promover la reconstrucción.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-7" type="radio" value="7" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-7"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Regionalización para la atención de problemas públicos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-8" type="radio" value="8" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-8"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejora del ordenamiento territorial y ecológico de los asentamientos humanos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-9" type="radio" value="9" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-9"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Garantizar el ejercicio pleno de los derechos de las mujeres y una vida libre de violencia.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-10" type="radio" value="10" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-10"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Prevención de la violencia y el delito.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida cualquier tipo de violencia, por ejemplo, acoso escolar, violencia institucional, inseguridad, etc.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-11" type="radio" value="11" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-11"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Problemáticas vinculadas a la migración.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-12" type="radio" value="12" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-12"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Fortalecer la profesionalización de los servidores públicos, así́ como su sensibilización, capacitación, promover su ética e integridad.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye personal docente, funcionarios y trabajadores de la administración pública en cualquier nivel de gobierno.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-13" type="radio" value="13" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-13"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejorar el equipamiento de los espacios educativos 
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-14" type="radio" value="14" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-14"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-15" type="radio" value="15" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-15"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejorar y ampliar el equipamiento de salud y rehabilitación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-16" type="radio" value="16" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-16"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promoción y prevención en salud.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-17" type="radio" value="17" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-17"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover la vigilancia y supervisión ambiental eficaz, eficiente, transparente y participativa para prevenir y controlar la contaminación y la degradación ambiental.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye temas de agua, suelo, aire, ruido, etc.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-18" type="radio" value="18" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-18"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Impulso a la movilidad accesible y sostenible priorizando los modos de transporte público eficientes y bajos en emisiones, así como la movilidad no motorizada.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-19" type="radio" value="19" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-19"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Salvaguardar y difundir la riqueza patrimonial de México, tanto material como inmaterial, así como promover la apropiación social de las humanidades, las ciencias y las tecnologías.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la diversidad cultural y lingüística.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-22" type="radio" value="22" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-22"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Impulsar el desarrollo y adopción de nuevas tecnologías en los sectores productivos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-23" type="radio" value="23" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-23"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-24" type="radio" value="24" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-24"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-25" type="radio" value="25" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-25"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
            </label>
                
    </div>

`;
                            resultado.innerHTML = elementodos;
                        })
                        areatres.addEventListener('click',()=>{
                            const elementodos = `
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="1" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-2" type="radio" value="2" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-4" type="radio" value="4" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-4"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                El aprovechamiento sustentable y conservación de los recursos naturales, áreas naturales protegidas y sitios RAMSAR a través de la innovación.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la conservación y protección de los ecosistemas terrestres y acuáticos, así́ como la biodiversidad para garantizar la provisión y calidad de sus servicios ambientales.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-7" type="radio" value="7" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-7"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Regionalización para la atención de problemas públicos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-8" type="radio" value="8" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-8"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejora del ordenamiento territorial y ecológico de los asentamientos humanos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-11" type="radio" value="11" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-11"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Problemáticas vinculadas a la migración.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-14" type="radio" value="14" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-14"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-19" type="radio" value="19" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-19"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Salvaguardar y difundir la riqueza patrimonial de México, tanto material como inmaterial, así como promover la apropiación social de las humanidades, las ciencias y las tecnologías.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la diversidad cultural y lingüística.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-20" type="radio" value="20" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-20"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover el desarrollo de habilidades, innovación y herramientas tecnológicas a través de la incubación y el acompañamiento de actividades productivas.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-21" type="radio" value="21" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-21"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Fortalecer la protección a los derechos de propiedad industrial e intelectual, que vincule a la comunidad científica con los sectores público, social y privado.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-23" type="radio" value="23" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-23"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-24" type="radio" value="24" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-24"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-25" type="radio" value="25" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-25"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
            </label>
                
    </div>
`;
                            resultado.innerHTML = elementodos;
                        })
                        areacuatro.addEventListener('click',()=>{
                            const elementodos = `
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-1" type="radio" value="1" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-1"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-2" type="radio" value="2" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-2"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-4" type="radio" value="4" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-4"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                El aprovechamiento sustentable y conservación de los recursos naturales, áreas naturales protegidas y sitios RAMSAR a través de la innovación.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la conservación y protección de los ecosistemas terrestres y acuáticos, así́ como la biodiversidad para garantizar la provisión y calidad de sus servicios ambientales.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-5" type="radio" value="5" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-5"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Atender la vulnerabilidad ante el cambio climático, el fortalecimiento de la resiliencia y las capacidad humana e institucional de adaptación, mitigación y reconstrucción.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye reducir el riesgo de desastres y la respuesta y atención de las emergencias y desastres provocados por el cambio climático, fenómenos naturales o actividades humanas, para disminuir su impacto y promover la reconstrucción.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-6" type="radio" value="6" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-6"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Uso de tecnologías bajas en carbono y fuentes de generación de energía renovable que promuevan la reducción de la emisión de contaminantes a la atmosfera, el suelo y el agua.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-7" type="radio" value="7" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-7"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Regionalización para la atención de problemas públicos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-13" type="radio" value="13" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-13"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejorar el equipamiento de los espacios educativos 
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-14" type="radio" value="14" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-14"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-15" type="radio" value="15" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-15"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Mejorar y ampliar el equipamiento de salud y rehabilitación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-17" type="radio" value="17" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-17"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover la vigilancia y supervisión ambiental eficaz, eficiente, transparente y participativa para prevenir y controlar la contaminación y la degradación ambiental.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye temas de agua, suelo, aire, ruido, etc.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-18" type="radio" value="18" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-18"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Impulso a la movilidad accesible y sostenible priorizando los modos de transporte público eficientes y bajos en emisiones, así como la movilidad no motorizada.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-19" type="radio" value="19" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-19"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Salvaguardar y difundir la riqueza patrimonial de México, tanto material como inmaterial, así como promover la apropiación social de las humanidades, las ciencias y las tecnologías.
            </label>
                <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la diversidad cultural y lingüística.</label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-20" type="radio" value="20" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-20"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Promover el desarrollo de habilidades, innovación y herramientas tecnológicas a través de la incubación y el acompañamiento de actividades productivas.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-21" type="radio" value="21" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-21"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Fortalecer la protección a los derechos de propiedad industrial e intelectual, que vincule a la comunidad científica con los sectores público, social y privado.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-22" type="radio" value="22" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-22"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Impulsar el desarrollo y adopción de nuevas tecnologías en los sectores productivos.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-23" type="radio" value="23" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-23"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-24" type="radio" value="24" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-24"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
            </label>
                
    </div>
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-25" type="radio" value="25" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-25"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
            </label>
                
    </div>

`;
                            resultado.innerHTML = elementodos;
                        })
                    </script>
                    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
                    <div class="my-3">
                        <label class="labelStyle 2xl:text-xl">
                            3._ Registra los siguientes datos que se te solicitan
                        </label>
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Nombre de la propuesta

                        </label>
                        <input class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline" type="text"
                            name="name" placeholder="Ingresa el nombre de tu propuesa" value="{{$data->name}}" />
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Objetivo de la propuesta

                        </label>
                        <textarea name="objetive" id="" rows="10" cols="45"placeholder="Maximo 500 caracteres"
                            maxlength="500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">{{$data->objetive}}</textarea>
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Descripción actual de la problemática

                        </label>
                        <textarea name="description" id="" rows="10" cols="45" placeholder="Maximo 2500 caracteres"
                            maxlength="2500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">{{$data->description}}</textarea>
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; Grupo de impacto

                        </label>
                        <div class="md:w-[60%] bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                            role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                    </svg></div>
                                <div>
                                    <p class="font-bold">Importante</p>
                                    <p class="text-sm">Describe a detalle los
                                        beneficiarios, por ejemplo: comunidades,
                                        grupos indígenas, grupos vulnerables,
                                        niñez, etc.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <textarea name="group" id="" rows="10" cols="45" placeholder="Maximo 2500 caracteres"
                            maxlength="2500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">{{$data->group}}</textarea>
                            <label class="labelStyle 2xl:text-xl">
                                &nbsp; Lugar o región de impacto (espacio físico):
                                <span class="text-slate-500">¿No conoces tu región? <a class="text-blue-800" target="_blank"  href="{{URL('docs/Municipios por region.pdf')}}">Haz click aquí</a> </span><br>      
                            </label>
                        <select name="fk_idPlaces" onchange="selectLugar()" id="lugarSelected" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">
                            @if (null == $data->fk_idPlaces)
                                <option selected value="">Selecciona la región</option>
                            @endif
                            @foreach ($places as $place)
                                
                                @if ($place->name == $data->fk_idPlaces)
                                    {{ $lugarImpacto = $place->name }}
                                    <option selected value="{{$place->name}}">{{$place->name}}</option>
                                @endif
                                @if ($place->name != $data->fk_idPlaces)
                                    <option value="{{$place->name}}">{{$place->name}}</option>
                                @endif
                                
                            @endforeach
                            @if ($lugarImpacto != $data->fk_idPlaces && null != $data->fk_idPlaces)
                                <option selected value="{{$data->fk_idPlaces}}">{{$data->fk_idPlaces}}</option>
                            @endif
                            
                            <option value="otros">Otra opción</option>
                        </select>

                        <div id="hiddenInput" class="md:ml-2 2xl:my-4 w-[60%] hidden">
                            <label class="labelStyle 2xl:text-xl" for="fk_idPlaces">
                                Especifica tu lugar o región de impacto
                            </label>
                            <input class="inputsStyle focus:outline-none focus:shadow-outline" type="text" name="fk_idPlaces"
                                disabled id="lugarInput" value="{{ old('fk_idPlaces') }}" placeholder="Ingresa la región de impacto" />
                            @error('fk_idPlaces')
                                <small class="text-red-800">*{{ $message }}</small>
                            @enderror
                        </div>
                        <label class="labelStyle 2xl:text-xl">
                            &nbsp; ¿Qué esperas lograr con tu propuesta?

                        </label>
                        <textarea name="reach" id="" rows="10" cols="45" placeholder="Maximo 2500 caracteres"
                            maxlength="2500" class="inputsStyle md:w-[60%] focus:outline-none focus:shadow-outline">{{$data->reach}}</textarea>

                        {{-- AQUI VAN LOS CHECKBOXES --}}
                        <label class="labelStyle 2xl:text-xl md:w-[60%]" for="firstName">
                            &nbsp; De acuerdo con la naturaleza de tu
                            propuesta, selecciona el o los objetivos
                            de Desarrollo Sostenible que impacta

                        </label>
                        <span class="block mb-2 text-sm font-thin text-gray-700 2xl:text-xl md:w-[60%]">
                            Podrás elegir como máximo 5 opciones</span>
                            <div class="w-[60%] h-[30vh] flex overflow-y-auto flex-col flex-grow">
                            @foreach ($ods as $odsOption)
                            @if ($odsOption->idOds == $odsOne || $odsOption->idOds == $odsTwo || $odsOption->idOds == $odsThree || $odsOption->idOds == $odsFour || $odsOption->idOds == $odsFive)
                            <div class="md:w-full flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                <input checked onchange="validacion('form1', this)" id="{{$odsOption->idOds}}" type="checkbox" value="{{$odsOption->idOds}}" name="fk_idOds[]"
                                    class="idOds w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{$odsOption->idOds}}"
                                    class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">{{$odsOption->objetive}}
                                </label>
                            </div>
                            @endif
                            
                            @if ($odsOption->idOds != $odsOne && $odsOption->idOds != $odsTwo && $odsOption->idOds != $odsThree && $odsOption->idOds != $odsFour && $odsOption->idOds != $odsFive)
                            <div class="md:w-full flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                <input id="{{$odsOption->idOds}}" type="checkbox" value="{{$odsOption->idOds}}" name="fk_idOds[]"
                                    class="idOds w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{$odsOption->idOds}}"
                                    class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">{{$odsOption->objetive}}
                                </label>
                            </div>
                            @endif
                            
                            @endforeach

                                <br>
                            <script language="javascript">
                                //VALIDACION CHECKBOX
                                $(document).ready(function(){
		var cantidadMaxima=5;
	// Evento que se ejecuta al soltar una tecla en el input
	$("#cantidad").keydown(function(){
		$("input[type=checkbox].idOds").prop('checked', false);
		$("#seleccionados").html("0");
	});
 
	// Evento que se ejecuta al pulsar en un checkbox
	$("input[type=checkbox].idOds").change(function(){
 
		// Cogemos el elemento actual
		var elemento=this;
		var contador=0;
 
		// Recorremos todos los checkbox para contar los que estan seleccionados
		$("input[type=checkbox].idOds").each(function(){
			if($(this).is(":checked"))
				contador++;
		});
 

 
		// Comprovamos si supera la cantidad máxima indicada
		if(contador>cantidadMaxima)
		{
			alert("Has seleccionado más opciones de lo indicado.");
 
			// Desmarcamos el ultimo elemento
			$(elemento).prop('checked', false);
			contador--;
		}
 
		$("#seleccionados").html(contador);
	});
});
                                </script>
                                


                            </div>

                  
                            <input type="hidden" name="fk_idUsers" value="{{ auth()->user()->idUser }}">
                        {{-- BOTON SUBMIT --}}
                        @endforeach
                        <div class="my-5">
                            <button id="guardarTarde"
                                class="bg-[#AA983F] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Guardar para mas tarde
                            </button>
                            <div class="py-5">
                                <input onchange="hiddenGuardar()" type="checkbox" class="finalizar" name="finished" value="true">
                                <label>He terminado la propuesta (Una vez terminada, ya no podrás modificarla.)</label>
                                <div class="md:w-auto bg-red-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-5"
                            role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                    </svg></div>
                                <div>
                                    <p class="font-bold">Importante</p>
                                    <p class="text-sm">Recuerda que tu propuesta debe tener todos los campos completados para que se valida por nuestros administradores, de lo contrario
                                        será eliminada.
                                    </p>
                                </div>
                            </div>
                        </div>
                            </div>
                            <button disabled id="enviar"
                                class="bg-[#635C44] hover:bg-[#484332] text-white 2xl:text-xl font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Enviar propuesta
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <script type="text/javascript">
            var disabled = document.getElementById("enviar").disabled;
            var disabledTarde = document.getElementById("guardarTarde").disabled;

            document.querySelector(".finalizar").addEventListener('change', (event) => {
                if (event.target.checked) {
                  document.getElementById("enviar").disabled=false;
                  document.getElementById("guardarTarde").disabled=true;
                } else {
                  document.getElementById("enviar").disabled=true;
                  document.getElementById("guardarTarde").disabled=false;
                }
            })

            function selectLugar() {
                d = document.getElementById("lugarSelected").value;
                var disabled = document.getElementById("lugarInput").disabled;
                if (d == "otros") {
                    document.getElementById("lugarInput").disabled = false;
                    document.getElementById("lugarInput").classList.add('bg-green-200');
                    document.getElementById("hiddenInput").classList.remove('hidden');
                    document.getElementById("hiddenInput").classList.add('none');
                
                
                } else {
                    document.getElementById("lugarInput").disabled = true;
                    document.getElementById("lugarInput").value = "";
                    document.getElementById("lugarInput").classList.remove('bg-green-200');
                    document.getElementById("hiddenInput").classList.add('hidden');
            }

    };
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    @endauth
    @guest
        <div class="w-full grid items-center justify-center ">
            <h1 class="text-3xl font-bold text-center  mt-5">Inicia sesión para ver el contenido</h1>
            <a class="text-xl text-white font-bold text-center bg-[#AA983F] hover:bg-[#8c7e36] p-2 m-[10%] rounded focus:outline-none focus:shadow-outline "   href="{{ route('proveicydet.login') }}">Inicia sesión</a>
        </div>

        


    @endguest











@endsection
