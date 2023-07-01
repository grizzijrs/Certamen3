@extends('template.master')
@section('contenido-principal')

<div class="todos">
  <div class="container-fluid min-vh-100 d-flex flex-column justify-content-lg-center">
    <div class="row d-flex align-items-start justify-content-center flex-column">
      <div class="col-3">
        <div class="card">
        <div class="card-header">
           <h5 class="text-center">Editar Usuario</h5>
        </div>
          <div class="card-body text-center">
            <form method="POST" action="{{route('cuenta.update',$cuenta->user)}}">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="nombre" class="form-label">Editar Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cuenta->nombre}}">
              </div>
              <div class="mb-3">
                <label for="apellido" class="form-label">Editar Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{$cuenta->apellido}}">
              </div>
              <button type="submit" class="btn btn-success">Confirmar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
