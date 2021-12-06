<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-3 text-center">
                <a href="{{route('revisor.accepted')}}" class="btn btn-success">{{__('ui.addsAccepted')}}</a>
            </div>
            <div class="col-3 text-center">
                <a href="{{route('revisor.rejected')}}" class="btn btn-danger">{{__('ui.addsRejected')}}</a>
            </div>
            <div class="col-12 text-center mt-5">
                <h2 class="display-4">{{__('ui.addsToReview')}}</h2>
            </div>
        </div>    
        
        @if($announce)
        
        <div class="row">     
            <div class="col-12 my-4 px-3">
                <div class="card category-card">
                    <div class="card-body row justify-content-center">
                        <div class="col-md-4 col-12 bg_car">
                            
                            <div
                            style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                
                                @foreach ($announce->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{$image->getUrl(500,500)}}" />
                                    </div>
                                    @endforeach
                                    
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($announce->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{$image->getUrl(500,500)}}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-12 col-md-8">
                            <h5 class="card-title">{{$announce->name}}</h5>
                            {{-- <a href="{{route('filter.category', ['category'=>$category])}}"><h6 class="card-subtitle mb-2 text-muted">{{$announce->category->name}}</h6></a> --}}
                            <p class="card-text">{{$announce->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero earum, provident qui aspernatur quisquam maxime voluptas sequi optio cumque adipisci ad reprehenderit eius dolores possimus, ullam quae sed voluptates accusamus.</p>
                            <p class="fs-6 fw-light">{{__('ui.postedBy')}} {{$announce->user->name}}</p>
                            <p class="fw-bolder">{{__('ui.price')}} {{$announce->price}},00€</p>
                            <p class="fw-bold">{{__('ui.postedAt')}}{{$announce->created_at->format('d/m/Y')}}</p>
                            <form action="{{route('revisor.reject', ['id'=>$announce->id])}}" method="POST">@csrf
                                <button type="submit" class="btn btn-danger">{{__('ui.reject')}}</button></form>
                                <form action="{{route('revisor.accept', ['id'=>$announce->id])}}" method="POST">@csrf
                                    <button type="submit" class="btn btn-success">{{__('ui.accept')}}</button></form>
                                    <div class="row h-30">
                                        <div class="col-3 d-flex justify-content-end align-items-end ms-auto me-3">
                                            <a class="btn-custom px-3" href="{{route('announce.show', compact('announce'))}}">{{__('ui.detail')}}</a>       
                                        </div>
                                    </div>
                                </div>                  
                            </div>
                            <h2 class="display-3 text-center">controllo immagini</h2>
                            @foreach($announce->images as $image)
                            <div class="row my-2 align-items-center">
                                <div class="col-12">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="{{$image->getUrl(500,500)}}" />
                                </div>
                                <div class="col-6">
                                    <h3 class="my-4">safe search image:</h3>
                                    <ul>
                                        <li class="d-flex my-2">adult: <div class="pegi ms-2 {{$image->adult}}"></div></li class="d-flex">
                                        <li class="d-flex my-2">spoof: <div class="pegi ms-2 {{$image->spoof}}"></div></li class="d-flex">
                                        <li class="d-flex my-2">medical: <div class="pegi ms-2 {{$image->medical}}"></div></li class="d-flex">
                                        <li class="d-flex my-2">violence: <div class="pegi ms-2 {{$image->violence}}"></div></li class="d-flex">
                                        <li class="d-flex my-2">racy: <div class="pegi ms-2 {{$image->racy}}"></div></li>
                                    </ul>
                                    <h3 class="my-4">image labels</h3>
                                    @if($image->labels)
                                    <p>
                                        @foreach($image->labels as $label)
                                        {{$label}} | 
                                        @endforeach
                                    </p>
                                    @endif

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="display-6">{{__('ui.noAdsToReview')}}</h2>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </x-layout>