<x-layout>

<section class="container p-3">
  <div class="row">
    <div class="col-12 col-md-6 m-auto search  p-3">
      <div class="row">
        <div class="col-12 text-center">
            <h4 class="pb-3">Effettua l'accesso</h4>
        </div>
    </div>
      <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label ">Indirizzo Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci email" value="{{old('email')}}">
          @error('email')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password"  placeholder="Inserisci password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
          @error('password')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-custom m-auto">Accedi</button>
        <a href="{{route('register')}}">Non sei ancora registrato?</a> <br>
        <a href="{{route('password.request')}}">Hai dimenticato la tua password?</a>
      </form>
    </div>
  </div>
</section>

    
</x-layout>