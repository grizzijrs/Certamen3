@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')

<style>
  .todos {
    margin-top: 50px;
  } 
</style>

<div class="todos">
    <div class="container-fluid d-flex flex-column align-items-center">
        <div class="row align-items-center">
            <hr>
            <center>
                <h1>Fotos Baneadas</h1>
            </center>
            <div class="col-lg-4 m-5">
                <div class="d-flex align-items-center">
                    <span class="material-icons" style="font-size: 10rem;">
                    account_circle
                    </span>
                    <div>
                    <div class="d-flex flex-row">
                        @if (Auth::user())
                        <div class="col">
                            <h2>{{Auth::user()->user}} </h2>
                        </div>
                        @endif
    
                    </div>
                    <h6>Fotos: {{count($cuenta->imagenes)}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid d-flex flex-column align-items-center">
        <div class="row">
            <div class="col-6">
                <a href=""></a>
                <a class="btn btn-primary" href="{{route('cuenta.perfiles',$cuenta->user)}}">Mis publicaciones</a>
            </div>  
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($cuenta->imagenes as $imagen)
            @if ($imagen->baneada)
                    <div class="col-4">
                        <div class="card mb-3 mt-3">
                            <h6>@<span>{{$cuenta->user}}</span></h6>
                            <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="..." style="max-height: 400px; max-width: 470px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{$imagen->titulo}}</h5>
                                
                                <br>
                                Motivo de ban: <span class="text-danger">{{$imagen->motivo_ban}}</span>
                            </div>
                        </div>
                    </div>
            @endif
    
        @endforeach
    </div>
</div>
    

@endsection