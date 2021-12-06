<x-layout>
     
    <section class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-5">{{__('ui.categories')}}</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($categories3 as $category)
                <div class="col-md-3 col-10 m-auto p-3 text-center">
                    <div class="category-card{{$category->id}} zoom-hover d-flex flex-column align-items-center p-3 py-4">
                        <div class=" col-12 d-flex flex-column align-items-center pt-2">
                            <div class="col-12 d-flex align-items-center justify-content-center pb-2">
                                <img src="/media/presto-cerchio.svg" alt="logo" class="logo mb-3 me-2">
                                <h4 class="mb-3 text-white">{{$category->name}}</h4>
                            </div>
                            <div class="col-12 pb-2">
                                <a class="btn-custom-category{{$category->id}} fs-5 w-100" href="{{route('filter.category', compact('category'))}}">{{__('ui.explore')}}</a>
                            </div>    
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col-md-3 col-10 m-auto p-3 text-center pt-3">
                    <div class="category-card4 zoom-hover d-flex flex-column align-items-center p-3 py-4">
                        <div class="col-12 d-flex align-items-center justify-content-center pb-2 pt-2">
                            <img src="/media/presto-cerchio.svg" alt="logo" class="logo mb-3 me-2">
                            <h4 class="mb-3 text-white">{{__('ui.showAll')}}</h4>
                        </div>
                    <div class="col-12 pb-2">
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class=" btn-custom-category4 fs-5 w-100" type="button">{{__('ui.explore')}}</button>
                    </div>
                </div>
            </div>
        </div>
    <section class="container bg-white my-4 container-pa">
        <div class="row px-3">
            <div class="col-md-4 col-12 d-flex flex-column align-items-start justify-content-center my-3">
                <h3 class="fw-bolder">Ci vuole un albero!</h3>
                <p class="fs-4">Insieme salviamo il pianeta</p>
                <a href="{{route('project')}}" class="link-section-pa fw-bold">Scopri di più</a>
            </div>
            <div class="col-12 col-md-5 m-auto">
                <a href="{{route('announce.create')}}" class="btn-custom btn-inserisci-annunci fs-6 p-2 d-flex align-items-center justify-content-center">
                    <i class="far fa-plus-square fs-3 "></i><h4>{{__('ui.newAnnounce')}}</h4>
                  </a>
            </div>
            <div class="col-12 col-md-3 p-5">
                <img src="/media/albero.png" class="img-fluid" alt="">
            </div>
        </div>
    </section>
    </section>
      
    <div class="container pt-md-4">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-5 uppercase">{{__('ui.newannounces')}}</h2>
            </div>
        </div>
        @foreach ($announces as $announce)
            <div class="row justify-content-center">     
                <div class="col-10 my-4 px-3">
                    <div class="card category-card">
                        <div class="card-body row justify-content-center">
                            <div class="col-12 col-md-4 d-flex justify-content-center bg_card">
                               
                                    @foreach ($announce->images as $image)
                                        @if($loop->first)
                                            <img src="{{$image->getUrl(250,250)}}" class="img-fluid rounded" alt="">
                                        @endif
                                    @endforeach
                               
                            </div>
                                <div class="col-12 col-md-8">
                                    <div class="row h-100 align-items-between">
                                    <div class="col-12">
                                        <h5 class="card-title">{{$announce->name}}</h5>
                                        <a href="{{route('filter.category', ['category'=>$announce->category])}}"><h6 class="card-subtitle mb-2 text-muted">{{$announce->category->name}}</h6></a>
                                        <p class="card-text">{{$announce->description}}</p>
                                        <p class="fs-6 fw-light">{{__('ui.postedBy')}}{{$announce->user->name}}</p>
                                        <p class="fw-bolder">{{__('ui.price')}} {{$announce->price}},00€</p>
                                        <p class="fw-bold">{{__('ui.postedAt')}} {{$announce->created_at->format('d/m/Y')}}</p>
                                    </div>
                                    <div class="col-12 d-flex align-items-end">   
                                        <a class="btn-custom ms-auto px-2 fs-4" href="{{route('announce.show', compact('announce'))}}">{{__('ui.detail')}}</a>
                                    </div>
                                </div>      
                            </div>                  
                        </div>
                    </div>
                </div>          
            </div>
        @endforeach
        <div class="row pb-5 mb-5">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{route('announce.index')}}" class="btn btn-custom display-6 fs-2">{{__('ui.allAdds')}}</a>
            </div>
        </div>
    </div>
  




    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('ui.allCategories')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <select class="form-select" aria-label="Default select example" onchange="location = this.value;">
                <option selected>{{__('ui.chooseCategory')}}</option>
                @foreach($categories as $category)
                <option value="{{route('filter.category', compact('category'))}}">{{$category->name}}</option>
                @endforeach
              </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.closeModal')}}</button>
        </div>
      </div>
    </div>
  </div>
    
</x-layout>


