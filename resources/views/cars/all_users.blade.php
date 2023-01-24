@extends('layouts.app')

@section('content')
    <h1>Liste des Utilisateurs</h1>
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="well">
                <div class="row">
                    
                    <div class="col-md-8 col-sm-8"> 
                        <h3><a href="/user/{{$user->id}}">{{$user->name}} </a></h3>
                        <h5>Contact : {{$user->mobile}}</h5>
                        <h5>E-mail: {{$user->email}}</h5>
                        <small>Inscrit à {{$user->created_at}} </small>
                        
                    </div>
                </div>
            </div>
        @endforeach
        {{$users->links()}}
    @else
        <p>No User found</p>
    @endif
@endsection