@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')

<style>
  .todo {
    margin-top: 50px;
  } 
</style>


<div class="todo">
    <div class="container-fluid d-flex flex-column align-items-center">
        <div class="row align-items-center">
            <hr>
                <center>
                    <h1>Bienvenido a tu Perfil</h1>
                </center>
            <div class="col-lg-4 m-5">

                <div class="d-flex align-items-center">
                    
                    <span class="material-icons" style="font-size: 10rem;">
                    account_circle
                    </span>
                    <div class="d-flex flex-row">
    
                        @if (Auth::user())
                        <div class="col ">
                            <br>
                            <h2>{{Auth::user()->user}} </h2>
                        </div>
                        @endif
                        <!-- <div class="col p-1">
                            <a href="" class="text-dark">
                                <span class="material-icons" style="font-size: 2rem;">
                                    settings
                                </span>
                            </a>
                        </div> -->
                    </div>
                    <!-- <h6>Publicaciones: {{count($cuenta->imagenes)}} </h6> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container d-flex flex-column align-items-center">
        <div class="row">
            <div class="col-12">
                <a type="button" class="btn btn-primary" href="{{route('cuenta.perfiles',$cuenta->user)}}">Publicaciones</a>
                <a type="button" class="btn btn-primary" href="{{route('baneadas.index',Auth::user()->user)}}">Publicaciones Baneadas</a>
                <button class="btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Subir Imagen</button>   
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
                @endif
            </div>
    
           
    
           
        </div>
    </div>
    
    
    
    <div class="row flex-row py-4">
        <div class="col-4 pb-2">
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel1">Publicar Imagen</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('imagen.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Publicar Imagen</label>
                                        <input type="file" id="imagen" name="imagen" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="titulo" class="form-label">Titulo</label>
                                        <input type="text" id="titulo" name="titulo" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Subir</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <hr>
        @foreach($cuenta->imagenes as $imagen)
            @if (!$imagen->baneada)
                <div class="col-4">
                    <div class="card mb-3 mt-3" >
                        <h6>@<span>{{$cuenta->user}}</span></h6>
                        <img src="{{ asset('storage/' . $imagen->archivo) }}" class="img-thumbnail" alt="..." style="max-height: 400px; max-width: 470px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{$imagen->titulo}}</h5>
                            <button class="btn btn-danger " type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}">
                                <span class="material-icons">settings</span>
                            </button>
                            <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">Confimar borrado</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{route('imagen.titulo',$imagen->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="mb-3 text-center">
                                    <label for="titulo" class="form-label">Cambiar titulo</label>
                                    <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp" value="{{$imagen->titulo}}">
                                    
                                </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Cambiar titulo</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-danger " type="submit"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="material-icons">delete</span>
                                </button>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confimar borrado</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{route('imagen.delete',$imagen->id)}}">
                                    @method('delete')
                                    @csrf
                                    <center>
                                        <div class="modal-body">
                                            Precione el Boton para confirmar
                                        </div>
                                    </center>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                            
    
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection