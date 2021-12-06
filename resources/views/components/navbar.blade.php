<section class="container-fluid nav-container pb-5">
  
  
  <nav class="navbar navbar-expand-lg navbar-light bg-trasparent">
    <div class="container">
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @if(Auth::user() && Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link d-flex" href="{{route('revisor.index')}}">
              {{__('ui.revisorHome')}}<h6 class="text-danger ms-2 me-4">{{\App\Models\Announce::ToBeRevisionedCount()}}</h6>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li>
            <span class="fs-4 sm-d-none">|</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('rps')}}">{{__('ui.vinciUnCoupon')}}</a>
          </li>
          <li>
            <span class="fs-4 sm-d-none">|</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about-us')}}">{{__('ui.about-us')}}</a>
          </li>
          <li>
            <span class="fs-4 sm-d-none">|</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('project')}}">{{__('ui.ourMission')}}</a>
          </li>
          @if (Auth::user() && Auth::user()->is_revisor == false)
          <li>
            <span class="fs-4 sm-d-none">|</span>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('revisorMail').submit();">{{__('ui.jobs')}}</a>
            <form action="{{route('revisor.mail')}}" method="POST" id="revisorMail" style="display: none">
              @csrf
            </form>
          </li>
          @endif
          <span class="fs-4 sm-d-none">|</span>
          <li class="nav-item">
            
            <a class="nav-link" href="{{route('announce.userAnnounce')}}">{{__('ui.myAnnounce')}}</a>
          </li>
          <li>
            <span class="fs-4 sm-d-none">|</span>
          </li>
          <li class="nav-item mt-1">
            @include('components.locale', ['lang' => 'it', 'nation' => 'it'])
          </li>
          <li class="nav-item mt-1">
            @include('components.locale', ['lang' => 'en', 'nation' => 'gb'])
          </li>
          <li class="nav-item mt-1">
            @include('components.locale', ['lang' => 'es', 'nation' => 'es'])
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if(session('message'))
        <div class="alert alert-success">
          {{session('message')}}
        </div>
        @endif
        
        @if(session('alert'))
        <div class="alert alert-danger">
          {{session('alert')}}
        </div>
        @endif
      </div>
    </div>
  </div>
  <section class="container pb-5">
    <div class="row nav-down">
      <a href="{{route('home')}}" class="col-12 col-md-3 container-logo">
        <img class="img-fluid img-nav zoom-hover" src="/media/presto slogan new.svg" alt="logo presto.it">
      </a>
      <div class="col-12 col-md-9 d-flex align-items-center justify-content-center">
        @guest
        <div class="row w-100">
          <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center container-user-btn">
            <a href="{{route('login')}}" class="btn me-1 fw-bold">{{__('ui.login')}}</a>
            <a href="{{route('register')}}" class="btn mx-1 fw-bold">{{__('ui.signIn')}}</a>
          </div>
          <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <a href="{{route('announce.create')}}" class="btn-custom btn-inserisci-annunci fs-6 p-2 d-flex align-items-center justify-content-center">
              <i class="far fa-plus-square fs-3"></i><h4>{{__('ui.newAnnounce')}}</h4>
            </a>
          </div>
        </div>
        @endguest
        @auth
        <div class="row w-100">
          <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center container-user-btn">
            <a href="" class="btn mx-2 fw-bold" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">{{__('ui.logout')}}</a>
            <form action="{{route('logout')}}" style="display: none" id="form-logout" method="POST">@csrf
              <button href="{{route('logout')}}" type="submit" class="btn">{{__('ui.logout')}}</button>
            </form>     
          </div>
          <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
            <a href="{{route('announce.create')}}" class="btn-custom btn-inserisci-annunci fs-6 p-2 d-flex align-items-center justify-content-center">
              <i class="far fa-plus-square fs-3"></i><h4>{{__('ui.newAnnounce')}}</h4>
            </a>
          </div>
        </div>
        @endauth
      </div>
    </div>
  </div>
</section>

</section>
@if (Route::is('home','announce.show','announce.search', 'filter.category', 'announce.index') )
<section class="container">
  <div class="row justify-content-center ">
    <div class="col-10 col-md-8 search p-4">
      <h4 class="text-center text-md-start">{{__('ui.lookingfor')}}</h4>
      <form action="{{route('announce.search')}}" method="GET" class="d-md-flex sm-align-end">
        <input type="text" name="q" class="form-control me-2 mb-2" placeholder="&#xF002; Vespa, Iphone, Fiat" style="font-family:Arial, FontAwesome">
        <button type="submit" class="btn-custom mb-2 p-1 px-3">{{__('ui.search')}}</button>
      </form>      
    </div>
  </div>
</section>
@endif
