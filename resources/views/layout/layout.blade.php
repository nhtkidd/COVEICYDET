<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon    -->
    <!-- styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-spaceGray flex flex-col min-h-screen justify-beetween">
    <!--header  -->
    <header class="bg-gold  w-full h-44"  >
        <div class="bg-spaceGray w-full h-8">
        </div>
        <div class="bg-white w-auto h-28 flex justify-center items-center">
            <img class=" h-[40%] md:h-[70%] " src="{{ URL('img/Header.png') }}">
        </div>


    </header>
    <!-- nav -->

    @yield('content')

    <!-- footer -->
    <footer class="footer bg-[#AA983F] w-auto h-28 flex justify-center items-center flex-col p-2 mt-auto" >
        <h2 class="font-bold text-center ">En caso de algún incidente con el uso de la plataforma para captura de propuestas, se brindará asistencia técnica a través:</h2>
        <div class="flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail pr-1" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="red" fill="white"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                <polyline points="3 7 12 13 21 7"></polyline>

            </svg>
            <a class="text-white font-semibold" href="mailto:soporte@proveicydet.gob.mx">soporte@proveicydet.gob.mx</a>
            
        </div>
        <h2 class="font-bold">Lunes a viernes de 8:00 a.m. - 8:00 p.m. hrs. </h2>
    </footer>
    <!-- scripts -->
    <script src="https://cdn.tailwindcss.com"></script>


</body>

</html>
