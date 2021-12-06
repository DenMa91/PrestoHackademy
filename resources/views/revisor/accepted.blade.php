<x-layout>

<section class="container">
    <div class="row">
        <div class="col12">
            <h1 class="display-5">{{__('ui.adsAccepted')}}</h1>
        </div>
    </div>
</section>

<Section class="container">
    @foreach ($announces as $announce)
        <div class="row justify-content-center">
            <div class="col-3">{{$announce->name}}</div>
            <div class="col-3">{{$announce->created_at}}</div>
            <div class="col-3">
                <form action="{{route('revisor.undo', ['id'=>$announce->id])}}" method="POST">@csrf
                    <button type="submit" class="btn btn-success">{{__('ui.reviewAgain')}}</button>
                </form>
            </div>
        </div>
    @endforeach
</Section>




</x-layout>