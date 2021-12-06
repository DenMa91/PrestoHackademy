<x-layout>
     
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-10 search">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="display-6">crea un annuncio</h2>
                    </div>
                </div>
                <form action="{{route('announce.store')}}" method="POST">
                    @csrf
                   
                    <input type="hidden" name= "uniqueSecret" value="{{$uniqueSecret}}">
                    
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label" >Nome Prodotto</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Es: bici, auto, moto, canguro" aria-describedby="emailHelp" value="{{old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Prezzo</label>
                        <input type="number" name="price" min="1" class="form-control @error('price') is-invalid @enderror" id="exampleInputPrice" aria-describedby="emailHelp" placeholder="Inserisci importo" value="{{old('price')}}">
                        @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCategory" class="form-label">Categoria</label>
                        <select name="category" id="exampleInputCategory" class="form-control" >
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Descrizione</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputDesription" placeholder="Una buona descrizione aumenta le probabilità di vendita!">{{old('description')}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label for="images" class="col-md-12 col-form-label text-md-right">Immagini Prodotto</label>
                        <div class="col-md-12 ">

                            <div class="dropzone img-load" id="drophere"></div>
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-custom m-auto">Metti in vendita</button>
                </form>
            </div>
        </div>
    </section>
    
    
    
</x-layout>