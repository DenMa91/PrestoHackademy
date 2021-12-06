<x-layout>

    <section class="container p-3">
      <div class="row">
        <div class="col-12 col-md-6 m-auto search  p-3">
          <div class="row">
            <div class="col-12 text-center">
              <h4 class="pb-3">Hai dimenticato la tua password?</h4>
            </div>
        </div>
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
        </div>
        @endif
          <form action="{{route('password.request')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Indirizzo email</label>
                <input type="email" name="email" placeholder="Inserisci email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{old('email')}}">
                @error('email')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-custom m-auto">Reset Password</button>
          </form>  
        </div>
      </div>
    </section>
      
  </x-layout>