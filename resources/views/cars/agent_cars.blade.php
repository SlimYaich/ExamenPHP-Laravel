@extends('layouts.app')

@section('content')
    <h1>Listes des Voitures</h1>
    @if(count($cars) > 0)
        @foreach($cars as $car)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/Car/{{$car->id}}">{{$car->brand}} </a></h3>
                       
                        <h6> Couleur :  {{$car->color}} </h6>
                        <h6> Type :  {{$car->type}} </h6>
                        <h6> Prix par Journée :  {{$car->prixJ}} Dinars </h6>
                    @if(!Auth::guest())
                        @if(Auth::user()->is_agent == 0)
                        <h6>Agent :{{$car->agency_name}}</h6>
                        @endif
                        @endif
                        
                        <small>Ecrit à {{$car->created_at}} 
                            
                            @if($car->isava ==1)

                            <br>
                            la voiture est disponible
                            @elseif($car->isava ==0)
                            <br>
                            la voiture est occupée
                            @endif
                            </small>
                    </div>
                    <div class="row">
<img class="rounded" src="{{URL::to('/images/'.$car->image)}}" alt="" height="150" width="300" style="width:100% height:auto" >
</div>

                </div>
            </div>
        @endforeach
        {{$cars->links()}}
    @else
        <p>Aucune voiture trouvée</p>
    @endif
@endsection