@extends('template.master')
@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('contenido-principal')

<style>
    .table {
      border-collapse: separate;
      border-spacing: 0 10px;
    }

  .table th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
  }

  .table td {
    background-color: #f8f9fa;
  }

  .table tr:hover td {
    background-color: #e9ecef;
  }

  .table td, .table th {
    border-right: 1px solid #dee2e6;
  }

  .table th:last-child, .table td:last-child {
      border-right: none;
  }

</style>


<div class="row d-flex align-items-center justify-content-center flex-column vh-100">
    <div class="col-8">
      <h1>
        <center>
          Lista de Usuarios
        </center>
      </h1>
      <hr>
        <table class="table">
          <thead>
            <tr>
              <th scope="col"><center>USUARIO</center></th>
              <th scope="col"><center>NOMBRE</center></th> 
              <th scope="col"><center>APELLIDO</center></th>
              <th scope="col"><center>EDITAR</center></th>
               <th scope="col"><center>BORRAR</center></th> 
            </tr>
          </thead>
          <tbody>
            
            @foreach($cuentas as $cuenta)
                
            <tr>
              <td><center>{{$cuenta->user}}</center></td>
              <td><center>{{$cuenta->nombre}}</center></td>
              <td><center>{{$cuenta->apellido}}</center></td>
              <td> 
                @if (Gate::allows('admin'))
                  <center>
                    <a href="{{route('cuenta.editar', $cuenta->user)}}" class="btn btn-secondary @if(Auth::user()->perfil_id==$cuenta->perfil_id) d-none @endif">
                      <span class="material-icons">
                          edit
                      </span>
                    </a>
                  </center>
                @endif
              </td>
              <td>
                @if (Gate::allows('admin'))
                <center>
                  <button type="button" class="btn btn-danger @if(Auth::user()->perfil_id==$cuenta->perfil_id) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cuenta->user}}">
                      <span class="material-icons">
                          delete
                      </span>
                  </button>
                </center>
                <div class="modal fade" id="exampleModal{{$cuenta->user}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$cuenta->user}}">El susuario sera eliminad@ del sistema</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('cuenta.delete',$cuenta->user)}}">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            El perfil de <span class="text-danger fw-bold">{{$cuenta->user}}</span> sera eliminado de la pagina
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Borrar</button> 
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>

@endsection