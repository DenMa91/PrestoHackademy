<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- swiper css --}}
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
   
    {{-- CUSTOM CSS  --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="icon" href="/media/e Presto bicolore.svg" type="image/icon type">
    <title>Presto Xmen</title>

</head>
<body>
    <span class="icons-fixed fs-1 d-flex flex-column">
        <a class="btn fs-1" target="_blank" href="https://wa.me/00393487934801?text=Sono%20interessato%20alla%20macchina%20interested%20vendita">
            <i class="zoom-hover fab fa-whatsapp"></i>
        </a>
        <a class="btn fs-1" href="#">
            <i class="zoom-hover fas fa-chevron-up"></i>
        </a>
    </span>

    <x-navbar></x-navbar>

{{$slot}}

@if(Route::is('revisor.accepted', 'revisor.rejected', 'revisor.index'))

@else
   <x-footer></x-footer>
@endif
 
   {{-- script Fontawesome --}}
   <script src="https://kit.fontawesome.com/9840d2ee93.js" crossorigin="anonymous"></script>

   {{-- script swiper --}}
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   {{-- my script --}}
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>