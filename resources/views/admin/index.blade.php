@extends('layout.layout-admin')

@section('title', 'Administrador')

@section('content')
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<style>
    .piechart {
        max-height: 300px
    }
</style>
<div class="flex flex-row-reverse py-3 border-b-4 border-[#AA983F]">
                
    <a class="px-5 font-bold text-lg text-red-800" href="{{ route('proveicydet.destroy') }}">Cerrar sesión</a>
    <a class="px-5 font-bold text-lg text-black" href="{{route('proveicydet.admin.proposal')}}">Propuestas</a>
    <a class="px-5 font-bold text-lg text-black" href="{{route('proveicydet.admin.users')}}">Usuarios</a>
    <a class="px-5 font-bold text-lg text-gray-500 underline" href="{{route('proveicydet.admin')}}">Inicio</a>
    <h1 class="px-5 font-bold text-lg"> {{ auth()->user()->name }}</h1>
</div>
<div id="father" class="flex items-center justify-center h-auto">
    <div class="wrapper bg-white w-full md:w-[90%] h-auto] mt-10 ">
        <section id="bienvenida" class="w-full h-full md:h-[35%] lg:h-[70%]  p-[5%] text-center  ">
            <h1 class="text-xl lg:text-4xl font-bold">ADMINISTRADOR</h1><br>

            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded shadow-lg p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-[#AA983F]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff"  width="20px" height="20px" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>
                                </div>
                            </div>
                            <a class="flex-1 text-right md:text-center" href="{{route('proveicydet.admin.proposal')}}">
                                <h5 class="font-bold uppercase text-gray-400">Propuestas por validar</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{$proposals}}</h3>
                            </a>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded shadow-lg p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff"  width="20px" height="20px" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                </div>
                            </div>
                            <a class="flex-1 text-right md:text-center" href="{{route('proveicydet.admin.aceptado')}}">
                                <h5 class="font-bold uppercase text-gray-400">Propuestas aceptadas</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{$proposalsA}}</h3>
                            </a>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-white rounded shadow-lg p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffff"  width="20px" height="20px"  viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
                                </div>
                            </div>
                            <a class="flex-1 text-right md:text-center" href="{{route('proveicydet.admin.rechazado')}}">
                                <h5 class="font-bold uppercase text-gray-400">Propuestas rechazadas</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{$proposalsR}}</h3>
                            </a>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>

                <hr class="border-b-2 border-gray-600 my-8 mx-4">

                <div class="flex flex-row flex-wrap flex-grow mt-2 bg-transparent">

                    <div class="w-full md:w-1/2 p-3">
                        <!--Graph Card-->
                        <div class="bg-white rounded shadow-lg">
                            <div class="bg-[#AA983F] rounded p-3">
                                <h5 class="font-bold uppercase text-white">Propuestas</h5>
                            </div>
                            <div class="p-5 piechart w-100" id="piechart">
                                <script type="text/javascript">
                                    google.charts.load('current', {'packages':['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                    
                                        var data = google.visualization.arrayToDataTable([
                                            ['Task', 'Propuestas'],
                                            ['Aceptadas',     {{$proposalsA}}],
                                            ['Rechazadas',      {{$proposalsR}}],
                                            ['Por validar',  {{$proposals}}]
                                        ]);
                                
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                
                                    chart.draw(data);
                                    }
                                </script>
                            </div>
                        </div>
                        <!--/Graph Card-->
                    </div>
                    <!--NEW GRAPH-->
                    <div class="w-full md:w-1/2 p-3">
                        <!--Graph Card-->
                        <div class="bg-white rounded shadow-lg">
                            <div class="bg-[#AA983F] rounded p-3">
                                <h5 class="font-bold uppercase text-white">Usuarios</h5>
                            </div>
                            <div class="p-5 piechart w-100" id="piechart2">
                                <script type="text/javascript">
                                    google.charts.load('current', {'packages':['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                    
                                        var data = google.visualization.arrayToDataTable([
                                            ['Task', 'Usuarios'],
                                            ['Sin sede',     {{$users}}],
                                            ['Poza Rica de Hidalgo, Veracruz',      {{$users1}}],
                                            ['Martínez de la Torre, Veracruz',      {{$users2}}],
                                            ['Úrsulo Galván, Veracruz',      {{$users3}}],
                                            ['Tlacotalpan, Veracruz',      {{$users4}}],
                                            ['Cuitláhuac, Veracruz',      {{$users5}}],
                                            ['Tierra Blanca, Veracruz',      {{$users6}}],
                                            ['Nanchital de Lázaro Cárdenas del Río, Veracruz',      {{$users7}}],
                                            ['Kaná-Museo de ciencia y tecnología en Xalapa, Veracruz',  {{$users8}}]
                                        ]);
                                
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                                
                                    chart.draw(data);
                                    }
                                </script>
                            </div>
                        </div>
                        <!--/Graph Card-->
                    </div>
                </div>
            </div>
        </section>
    
</div>


</div>



@endsection
