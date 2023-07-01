@extends('template.master')
@section('contenido-principal')

<div class="container-fluid min-vh-100 d-flex flex-column justify-content-lg-center">
    <div class="row d-flex align-items-start justify-content-center flex-column">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Formulario de Registracion</h5>
                </div>
                <div class="card-body">
                
                    <form method="POST" {{route('artista.store')}}>
                        @csrf
                        <div class="mb-3 text-center">
                            <label for="nombre" class="form-label">Ingresar Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" value="{{old('nombre')}}">
                            @error('nombre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <label for="apellido" class="form-label">Ingresar Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="emailHelp" value="{{old('apellido')}}">
                            @error('apellido')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <label for="user" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="user" id="user" aria-describedby="emailHelp" value="{{old('user')}}">
                            @error('user')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                            @error('password') 
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                        <div class="row">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="submit" class="btn btn-success">Registrar</button>
                                <a href="{{route('home.index')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection