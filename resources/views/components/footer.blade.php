<footer class="py-5 container-fluid nav-container">
    <div class="row">
      <div class="col-4 col-md-2">
        <h5 class="footer-title">PRESTO</h5>
        <ul class=" nav flex-column">
          <li class="item mb-2"><a href="{{route('about-us')}}" class="nav-link p-0 text-muted">Su di noi</a></li>
          <li class="nav-item mb-2"><a href="{{route('about-us')}}" class="nav-link p-0 text-muted">Il team</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Blog</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Eventi</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Jobs</a></li>

        </ul>
      </div>

      <div class="col-4 col-md-2">
        <h5 class="footer-title">AIUTO</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contattaci</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Vendi su Presto</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Metodi di pagamento</a></li>
        </ul>
      </div>

      <div class="col-4 col-md-2 pb-3">
        <h5 class="footer-title">ESPLORA</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">{{__('ui.newAnnounce')}}</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Privacy</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sicurezza</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Consigli per la vendita</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Mappa del sito</a></li>
        </ul>
      </div>

      <div class="col-12 col-md-4  offset-md-1">
        <form>
          <h5>Vuoi essere il primo a conoscere le migliori offerte?</h5>
          <h6 class="pb-3" >Unisciti alla newsletter settimanale:</h6>

          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Inserisci email">
            <button class="btn-custom p-3" type="button">Iscriviti</button>
          </div>
          <div>
               
          </div>
        </form>
      </div>
    </div>


  
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-12 text-center">
          {{-- <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
          </a> --}}
          <span class="text-muted">© 2021 <code> < X-MeN/ > </code> Company, Inc. All rights reserved.</span>
        </div>
    
        {{-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
        </ul> --}}
      </div>
  </footer>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
