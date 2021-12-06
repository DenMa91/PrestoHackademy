<x-layout>

  <section class="container p-3">
    <div class="row">
      <div class="col-12 col-md-6 m-auto search  p-3">
        <div class="row">
          <div class="col-12 text-center">
            <h4 class="pb-3">Inserisci una nuova password</h4>
          </div>
      </div>
        <form method="POST" action="{{route('password.update')}}">
          @csrf
          <input type="hidden" name="token" value="{{$request->route('token')}}">
          <div class="mb-3">
              <label for="exampleInputEmail" class="form-label">Indirizzo email</label>
              <input type="email" name="email" placeholder="Inserisci email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$request->email}}">
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
          <button type="submit" class="btn btn-custom m-auto">Reset Password</button>
        </form>  
      </div>
    </div>
  </section>
    
</x-layout>