
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1><?php echo $title; ?></h1>
   
        <p><a class="btn btn-success"href="/login" role="button">Connexion</a> <a  class="btn btn-info" href="/register" role="button">Inscription</a></p>
    </div>
@endsection
