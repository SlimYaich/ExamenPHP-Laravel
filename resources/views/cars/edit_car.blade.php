@extends('layouts.app')

@section('content')
<div class="form">
    <h1>Modifier Voiture</h1>
    {!! Form::open(['action' => ['CarsController@update' , $car->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
            {{Form::label('model', 'Modéle')}}
            {{Form::text('model', '', ['class' => 'form-control', 'placeholder' => 'Modéle'])}}
        </div>

        <div class="form-group">
            {{Form::label('brand', 'Marque')}}
            {{Form::text('brand', '', ['class' => 'form-control', 'placeholder' => 'Marque'])}}
        </div>

        <div class="form-group">
            {{Form::label('color', 'couleur')}}
            {{Form::text('color', '', ['class' => 'form-control', 'placeholder' => 'Couleur'])}}
        </div>

        <div class="form-group">
            {{Form::label('prixJ', 'Prix par Jounée')}}
            {{Form::text('prixJ', '', ['class' => 'form-control', 'placeholder' => 'prixJ'])}}
        </div>
        

        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'type'])}}
        </div>

        <div class="form-group">
                            {!!Form::label('photo', 'Photo*') !!}
                        </div>
                        <div class="form-group">
                           {!!Form::file('photo',null,['class'=>'form-control'])!!}
                        </div>
       
        {{Form::hidden('_method','PUT')}}
        
        {{Form::submit('Modifier', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection





