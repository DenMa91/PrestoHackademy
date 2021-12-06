<x-layout>

    <section class="container">
        <div class="row">
            @foreach ($announces as $announce)
                <div class="row justify-content-center">     
                    <div class="col-12 col-md-10 my-4 px-3">
                        <div class="card category-card">
                            <div class="card-body row justify-content-center">
                                <div class="col-12 col-md-4 d-flex justify-content-center bg_card">
                                    @foreach ($announce->images as $image)
                                    @if($loop->first)
                                    <img src="{{$image->getUrl(250,250)}}" class="img-fluid rounded"alt="">
                                    @endif
                                    @endforeach
                                </div>
                                    <div class="col-12 col-md-8">
                                        <div class="row h-100 align-items-between">
                                        <div class="col-12">
                                            <h5 class="card-title">{{$announce->name}}</h5>
                                            <a href="{{route('filter.category', ['category'=>$announce->category])}}"><h6 class="card-subtitle mb-2 text-muted">{{$announce->category->name}}</h6></a>
                                            <p class="card-text">{{$announce->description}}</p>
                                            <p class="fs-6 fw-light">inserito da: {{$announce->user->name}}</p>
                                            <p class="fw-bolder">prezzo: {{$announce->price}},00€</p>
                                            <p class="fw-bold">inserito il: {{$announce->created_at->format('d/m/Y')}}</p>
                                        </div>
                                        <div class="col-12 d-flex align-items-end">   
                                            <a class="btn-custom ms-auto px-2 fs-4" href="{{route('announce.show', compact('announce'))}}">dettaglio</a>
                                        </div>
                                    </div>      
                                </div>                  
                            </div>
                        </div>
                    </div>          
                </div>
            @endforeach
        </div>
    </section>
    
</x-layout>