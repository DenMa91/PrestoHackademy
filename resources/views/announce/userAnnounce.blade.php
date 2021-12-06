<x-layout>
    <div class="container pt-md-4">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-5">I MIEI ANNUNCI</h2>
            </div>
        </div>
        @foreach ($announces as $announce)
        <div class="row justify-content-center">     
            <div class="col-12 col-md-10 my-4 px-3">
                @if ($announce->is_accepted == true)
                    <h5 class="text-success">Annuncio accettato</h5>
                    @elseif($announce->is_accepted === null)
                    <h5 class="text-primaty">Annuncio in fase di revisione</h5>  
                @elseif ($announce->is_accepted == false)
                    <h5 class="text-danger">Annuncio rifiutato</h5>
                @endif
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
</x-layout>