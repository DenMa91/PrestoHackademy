<x-layout>
  
  <div class="container mt-5 show-container mb-5">
    <div class="row justify-content-center">
      <div class="col-md-5 col-12 bg_car">
        
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
    <div class="col-12 col-md-5">
      <div class="row justify-content-between mb-3 show-cat">
        <div class="col-4"><h5>{{$announce->category->name}}</h5></div>
        <div class="col-4 text-end"><h6>caricato il {{$announce->created_at->format('d/m/Y')}}</h6></div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3>{{$announce->name}}</h3>
          <h5 class="mb-3">prezzo: {{$announce->price}},00 €</h5>
          <p>{{$announce->description}}</p>
        </div>
        <div class="col-12 mt-md-5 pb-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48343.76466401194!2d-73.99257609120936!3d40.77334409504805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20Stati%20Uniti!5e0!3m2!1sit!2sit!4v1637682978370!5m2!1sit!2sit" width="100%" height="100%" allowfullscreen="" loading="lazy"></iframe>
          @auth
            @if (Auth::user()->id==$announce->user_id) 
            <div class="d-flex justify-content-end pt-3">
              <a class="btn-custom p-1" href="{{route('announce.edit', compact('announce'))}}">Modifica</a>
            </div>
            @endif
            {{-- <a class="btn-custom-delete" href="" onclick="event.preventDefault(); getElementById('delete').submit();">Elimina</a>
            <form style="display:none;" id="delete" method="POST" action="{{route('announce.delete', compact('announce'))}}">
              @csrf
              @method('delete')
            </form> --}}
          @endauth
        </div>
      </div>
    </div>
  </div>
</div> 



</x-layout>