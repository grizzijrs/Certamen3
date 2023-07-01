@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')
<style>
  .container {
    margin-top: 70px;
  } 
 
</style>

<div class="container d-flex text-center">
  <div class="row flex-row py-4">
    <hr>
    <h1><center>Fotos Baneadas</center></h1>
    <hr>
    @foreach($imagenes as $imagen)
     
        @if ($imagen->baneada)
        <div class="col-4 pb-2"">
          <div class="card h-100 w-100 style="width: 25rem;">
          <br>
          <h6><span>USUARIO: {{$imagen->cuenta_user}}</span></h6>
          <br>
            <img src="{{asset('storage/' . $imagen->archivo)}}" class="card-img-top" class="card-img-bottom img-fluid" alt="" style="max-height: 20rem; min-height: 20rem;">
            <div class="card-body">
              <h5 class="card-title">Titulo: {{$imagen->titulo}}</h5>
              
              <div class="row">
                @if (Gate::allows('admin'))
                <form method="POST" action="{{route('imagen.desbanear',$imagen->id)}}">
                  @method('PUT')
                  @csrf
                  <div class="col text-end">
                    
                    <center>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}">
                        Motivo de BAN
                      </button>
                    </center>

                    
                    <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">----MOTIVOS----</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <!-- <div class="mb-3 text-center">
                            ¿Estas seguro que quieres desbanear la imagen del usuario @<span class="text-danger fw-bold">{{$imagen->cuenta_user}}</span>?
                            </div> -->
                            <div class="mb-3 text-center">
                            Motivo: <span class="text-danger fw-bold">{{$imagen->motivo_ban}}</span>
                            </div> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Desbanear imagen</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endif
    @endforeach
    
  </div>
</div>
@endsection