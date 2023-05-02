@extends('layouts.head')
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.loading')
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <!-- <a href="#" class="nav-link">Contact</a> -->
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Jogo #{{$jogo->id}}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Jogo #{{$jogo->id}}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Lista</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Descrição</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Comentários</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-tools d-flex justify-content-end mt-2 ">
                                                <div class="input-group-sm  d-flex justify-content-end" style="width: 150px;">

                                                    @hasPermission(1)
                                                    <form action="/status/jogos/{{$jogo->id}}" method="POST">
                                                        @csrf
                                                        @if ($jogo->status == 1)
                                                        <button type="submit" class="btn btn-sm btn-outline-danger mr-2">Finalizar</button>
                                                        @else
                                                        <button type="submit" class="btn btn-sm btn-outline-success mr-2">Reabrir</button>
                                                        @endif
                                                    </form>
                                                    @endhasPermission
                                                    <form action="/player/jogos/{{$jogo->id}}" method="POST">
                                                        @csrf
                                                        @if($player_status == 1)
                                                        <button type="submit" class="btn btn-sm btn-danger">Sair</button>
                                                        @else
                                                        <button type="submit" class="btn btn-sm btn-success">Entrar</button>
                                                        @endif
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Patente</th>
                                                        <th>Arma Própria</th>
                                                        <th>Inscreveu em</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($players as $player)
                                                    <tr>
                                                        <td>{{$player->nome}}</td>
                                                        <td>
                                                            <div class="d-flex  align-items-center">
                                                                <img src="{{ asset($player->patente  ) }}" alt="{{$player->patente_nome}}">
                                                                <span class="ml-1">{{$player->patente_nome}}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if($player->arma_propria == 1)
                                                            <span class="badge bg-success">Sim</span>
                                                            @else
                                                            <span class="badge bg-danger">Não</span>
                                                            @endif
                                                        <td>{{ date('d-m-Y', strtotime($player->created_at))}}</td>
                                                        <!-- Adicione mais campos conforme necessário -->
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="card-footer clearfix d-flex justify-content-center">
                                        @include('layouts.pagination', ['paginator' => $players, 'pageName' => 'players_page'])
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">

                                    <div class="callout callout-info">
                                        <h5>Descrição</h5>
                                        <p>{{$jogo->descricao}}</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-tools d-flex justify-content-end mt-2 ">
                                                <div class="input-group-sm  d-flex justify-content-end" style="width: 150px;">


                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Novo Comentário
                                                    </button>
                                                    @include('layouts.popup_comentario')
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card-body">
                                            @foreach($comentarios as $player)
                                            <div class="callout {{ $player->tipo_id == 1 ? 'callout-success' : ($player->tipo_id == 2 ? 'callout-warning' : 'callout-danger') }}">
                                                <h5>{{$player->tipo}}</h5>
                                                <p>{{$player->comentario}}</p>
                                                <div class="d-flex justify-content-end">
                                                    <span style="color: #808080">{{$player->created_at}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="card-footer clearfix d-flex justify-content-center">
                                        @include('layouts.pagination', ['paginator' => $comentarios, 'pageName' => 'comments_page'])
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">FARE</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


</body>
<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const paginationLinks = document.querySelectorAll('#custom-pagination .page-link');

    paginationLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();
            const paginationType = link.dataset.paginationType;
            const url = new URL(link.href);
            const currentPage = url.searchParams.get(paginationType);

            if (paginationType === 'players_page') {
                url.searchParams.set('players_page', currentPage);
                url.searchParams.delete('comments_page');
            } else if (paginationType === 'comments_page') {
                url.searchParams.set('comments_page', currentPage);
                url.searchParams.delete('players_page');
            }

            window.location.href = url.href;
        });
    });
});

</script>

</html>