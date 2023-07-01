@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')

<style>
  .container {
    margin-top: 50px;
  } 
 
</style>

<div class="container d-flex text-center">
  <div class="row flex-row py-4">
  <h1 class="titulo">
    <center>
      Bienvenidos a PhotoXoO
    </center>
  </h1>
  <hr>

    @foreach($imagenes as $imagen)
     
        @if (!$imagen->baneada)
        <div class="col-4 pb-2">
          <div class="card h-100 w-100" style="width: 25rem;">
            <br>
            <h6>@<span >{{$imagen->cuenta_user}}</span></h6>
            <br>

            <img src= "{{asset('storage/' . $imagen->archivo)}}" class="card-img-bottom img-fluid" alt="" style="max-height: 20rem; min-height: 20rem;">
            <div class="card-body ">
              <h5 class="card-title">{{$imagen->titulo}}</h5>
              <div class="row">
                @if (Gate::allows('admin'))
                <form method="POST" action="{{route('imagen.update',$imagen->id)}}">
                  @method('PUT')
                  @csrf
                  <div class="col text-end">
                    
                    <center>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}">
                        Banear Imagen
                      </button>
                    </center>

                    <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">Motivo de Ban</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <div class="mb-3">
                                Ingresa el Motivo de Ban para la Imagenen de <span class="text-danger fw-bold">{{$imagen->cuenta_user}}</span>
                              </div>
                            </center>
                            <hr>
                            <div class="mb-3 text-center">
                              <label for="motivo_ban" class="form-label">MOTIVO</label>
                              <input type="text" class="form-control" id="motivo_ban" name="motivo_ban">
                            </div>
                          </div>
                          <center>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-danger">Banear imagen</button>
                            </div>
                          </center>
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