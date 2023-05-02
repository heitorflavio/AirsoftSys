<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link d-flex justify-content-center">
    <img src="{{asset('img/logo2.png')}}" alt="AdminLTE Logo" class=" " style="opacity: .8">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex  align-content-center">
      <div class="image">
        <img src="{{ asset( auth()->user()->patente )}}" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Players
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @hasPermission(1)
            <li class="nav-item">
              <a href="/cadastro" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastro</p>
              </a>
            </li>
            @endhasPermission
            <li class="nav-item">
              <a href="/consulta/players" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consulta</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/consulta/players/aniversarios" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Aniversariantes</p>
              </a>
            </li>
          </ul>
        </li>



        <li class="nav-item menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Jogos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @hasPermission(1)
            <li class="nav-item">
              <a href="/cadastro/jogos" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastro</p>
              </a>
            </li>
            @endhasPermission
            <li class="nav-item">
              <a href="/consulta/jogos" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consulta</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-item menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Caixa
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @hasPermission(1)
            <li class="nav-item">
              <a href="/cadastro/caixa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastro</p>
              </a>
            </li>
            @endhasPermission
            <li class="nav-item">
              <a href="/consulta/caixa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consulta</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Sorteio
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @hasPermission(1)
            <li class="nav-item">
              <a href="/cadastro/sorteio" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cadastro</p>
              </a>
            </li>
            @endhasPermission
            <li class="nav-item">
              <a href="/consulta/sorteio" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consulta</p>
              </a>
            </li>
          </ul>
        </li> -->

        @hasPermission(1)
        <li class="nav-item">
          <a href="/consulta/usuarios" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Usuários
            </p>
          </a>
        </li>
        @endhasPermission

        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Sair</p>
          </a>
        </li>

      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>