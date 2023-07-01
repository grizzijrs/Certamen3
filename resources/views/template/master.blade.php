<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @yield('hojas-estilo')
    <title>Home</title>
</head>

<body>
  
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PhotoXoO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Bienvenidos a PhotoXoO!</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul>
            <li class="nav-item">
              <a class="nav-link" href="{{route('home.index')}}"><center>Inicio</center></a>
            </li>
            <hr class=" @if (Gate::allows('artista')) d-none @endif">
          
            <li class="nav-item @if (Gate::allows('artista')) d-none @endif">
              <a class="nav-link active" href="{{route('home.login')}}"><center>Iniciar Sesion</center></a>
            </li> 
            
            <hr class=" @if (Gate::allows('artista')) d-none @endif">
            
            <li class="nav-item @if (Gate::allows('artista')) d-none @endif"> 
              <a class="nav-link active" href="{{route('artista.index')}}"><center>Crear una Cuenta</center></a>
            </li>
            <hr>
      
            @if (Gate::allows('artista-perfil'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('artista.perfil',Auth::user()->user)}}"><center>Ver Perfil</center></a>
            </li>
            <hr>
            @endif
            
            @if (Gate::allows('admin')) 
            <hr>
            <li class="nav-item">
              <a class="nav-link" href="{{route('administrador.index')}}"><center>Ver Perfiles Ingresados</center></a>
            </li>
            @endif

            @if (Gate::allows('admin'))
            <hr>
            <li class="nav-item">
              <a class="nav-link" href="{{route('fotos.baneadas')}}"><center>Ver Fotos Baneadas</center></a>
            </li>
            @endif
            @if (Gate::allows('artista'))
            <hr>
            <li class="nav-item">
              <a class="nav-link" href="{{route('usuarios.logout')}}"><center>Cerrar Sesion</center></a>
            </li>
            
            <hr>
            @endif
            <form method="get" action="/search">
              <div class="input-group mb-3">
                  <input class="form-control" name="search" placeholder="Filtrar por Usuario" >
                  <button class="btn btn-outline-secondary " type="submit">Buscar</button>
              </div>
            </form>
            <hr>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main role="main" class="col-md-10 ml-sm-auto">
    <div class="container-fluid" style="height:">
      @yield('contenido-principal')
    </div> 
  </main>

  @yield('scripts-referencias')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  @yield('scripts-manual')
</body>
</html>