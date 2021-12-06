<x-layout>

  <section class="container p-3">
    <div class="row">
      <div class="col-12 col-md-6 m-auto search  p-3">
        <div class="row">
          <div class="col-12 text-center">
            <h4 class="pb-3">Registrati</h4>
          </div>
      </div>
        <form action="{{route('register')}}" method="POST">
          @csrf
          <div class="mb-3 ">
            <label for="exampleInputName" class="form-label">Username</label>
            <input type="text" name="name" placeholder="Scegli il nome utente" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="emailHelp" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail" class="form-label">Indirizzo email</label>
              <input type="email" name="email" placeholder="Inserisci email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{old('email')}}">
              @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" name="password" placeholder="Crea una password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Conferma password</label>
              <input type="password" name="password_confirmation" placeholder="Conferma password" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1">
              @error('password_confirmation')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-custom m-auto">Registrati</button>
          <a href="{{route('login')}}">Sei gia registrato?</a>
        </form>  
      </div>
    </div>
  </section>
    
</x-layout>