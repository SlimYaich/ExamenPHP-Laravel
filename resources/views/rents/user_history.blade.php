@extends('layouts.app')

@section('content')




<div class="well">

<a href="/Car" class="btn btn-default">Retour à la page précédente</a>

                <div class="row">
                    
                    <div class="col-md-8 col-sm-8">


  
    <h1>{{$car->brand}} </h1>
    <h6> Couleur {{$car->color}} </h6>
    <h6>Agent :{{$car->agency_name}}</h6>
     <br><br>
     <small>Ecrit à  {{$car->created_at}} 
                            
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

<div class="row">





            <br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $car->agency)
            <a href="/Car/{{$car->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['CarsController@destroy', $car->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
       
        @else
        
        {!! Form::open(['action' => ['RentController@destroy',$car->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
       
        
        {{Form::hidden('car_id', $car->id, ['class' => 'form-control'])}}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Supprimer', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
    @endif
@endsection