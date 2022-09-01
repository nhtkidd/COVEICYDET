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

<body class="bg-spaceGray">
    <!--header  -->
    <header class="bg-gold w-100 h-44 ">
        <div class="bg-spaceGray w-full h-8">
        </div>
        <div class="bg-white w-auto h-28">
            <img class="pl-8 h-[70%] md:h-[100%] md:h-28"  src="{{ URL('img/Header.jpg') }}">
        </div>
        

    </header>
    <!-- nav -->

    @yield('content')

    <!-- footer -->
    <!-- scripts -->
    <script src="https://cdn.tailwindcss.com"></script>


</body>

</html>
