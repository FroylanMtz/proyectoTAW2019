
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Proyecto TAW</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
  
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- SEARCH FORM -->

    <div class="input-group input-group-sm">
      <a style="btn btn-success" href="/proyectos"> <i class="fas fa-chevron-left"></i>  <b> Regresar </b> </a>
    </div>



  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo.png" alt="Lara Start Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Proyecto TAW</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{Auth::user()->name}}

            <p> {{Auth::user()->type}} </p>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          
          @if(Auth::user()->type == 'desarrollador')
                    
          <li class="nav-item">
            <router-link to="/informacion" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Información
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/tareas" class="nav-link">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>
                Tareas
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/pagos" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave-alt"></i>
              <p>
                Pagos
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/notificaciones" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notificaciones
              </p>
            </router-link>
          </li>


          <li class="nav-item">
            <router-link to="/mensajes" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mensajes
              </p>
            </router-link>
          </li>


          <li class="nav-item">
            <router-link to="/reportes" class="nav-link">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
                Reportes
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/cambios" class="nav-link">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
                Cambios
              </p>
            </router-link>
          </li>

          @elseif(Auth::user()->type == 'cliente')

            <li class="nav-item">
              <router-link to="/informacionCliente" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Informacion
                </p>
              </router-link>
            </li>

            <li class="nav-item">
              <router-link to="/notificacionesCliente" class="nav-link">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                  Notificaciones
                </p>
              </router-link>
            </li>

            <li class="nav-item">
              <router-link to="/mensajesCliente" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Mensajes
                </p>
              </router-link>
            </li>

            <li class="nav-item">
              <router-link to="/cambiosCliente" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                  Cambios
                </p>
              </router-link>
            </li>

          @endif

          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Perfil
              </p>
            </router-link>
          </li>

          <li class="nav-item">

              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  

                  <i class="nav-icon fas fa-power-off red"></i>
                  <p>
                    {{ __('Logout') }}
                  </p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>


          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <router-view></router-view>
          <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


@auth
  <script>
    window.user = @json(auth()->user()) 
  </script>
    
@endauth

<script src="/js/app.js"></script>

</body>
</html>
