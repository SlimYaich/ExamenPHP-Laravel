@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-sm-8">
    <li class="previous"><a href="/Car" title="Précédent">Retour à la page précédente</a></li>
    
    <h1>{{$car->brand}} </h1>
    
    <h6 class="clio">Agent :{{$car->agency_name}}</h6>
    <h6> La couleur de la voiture {{$car->color}} </h6>
    <h6> Le Prix par journée est  {{$car->prixJ}} Dinars </h6>
    <h6> Type :   {{$car->type}} </h6>



     <small>Ecrit à {{$car->created_at}} 
             
        
     <br><br>
     
      </small>
      </div>

      <div class="row">
<img class="rounded" src="{{URL::to('/images/'.$car->image)}}" alt="" height="150" width="300" style="width:100% height:auto" >
</div>

        <div class="row">



        <h1 >Les réservations</h1>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8"> 
                        <h3><a href="/user/{{$user->id}}">{{$user->name}} </a></h3>
                        
                        <h6>Date de début de Location: {{$user->rent_start}}</h6>
                        <h6>Date de fin de Location: {{$user->rent_end}}</h6>

                    </div>
                </div>
            </div>
        @endforeach
        {{$users->links()}}
    @else
        <p>Aucun utilisateurs trouvée</p>
    @endif


    <div class="form">

        @if($car->isava ==1)

        <br>
        la voiture est disponible

        @elseif($car->isava ==0)
        <br>
        la voiture est occupée
        @endif
        </small>
            <br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $car->agency)
            <a href="/Car/{{$car->id}}/edit" class="btn btn-default">Modifier</a>

            {!!Form::open(['action' => ['CarsController@destroy', $car->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
       
        @else
        
        {!! Form::open(['action' => ['RentController@store',$car->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       
        <div class="form-group">
            {{Form::label('rent_start_month', 'Début mois')}}
            {{Form::selectRange('rent_start_month', 1, 12, '', ['class' => 'form-control', 'placeholder' => 'Mois'])}}
            {{Form::label('rent_start_day', 'Débur jour')}}
            {{Form::selectRange('rent_start_day',1, 30, '', ['class' => 'form-control',  'placeholder' => 'Jour'])}}
            
        </div>

        <div class="form-group">
            {{Form::label('rent_end_month', 'Fin mois')}}
            {{Form::selectRange('rent_end_month',1, 12, '', ['class' => 'form-control', 'placeholder' => 'Mois'])}}
            {{Form::label('rent_end_day', 'fin Jour')}}
            {{Form::selectRange('rent_end_day',1, 30, '', ['class' => 'form-control', 'placeholder' => 'Jour'])}}
            {{Form::label('rent_year', 'Année')}}
            {{Form::selectRange('rent_year',2022, 2050, '', ['class' => 'form-control', 'placeholder' => 'Année'])}}
              
        </div>
        
        {{Form::hidden('car_id', $car->id, ['class' => 'form-control'])}}
        {{Form::submit('Réserver', ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
          
        @endif
    @endif
    </div>
@endsection