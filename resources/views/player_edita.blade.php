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
              <h1 class="m-0">Cadastro</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card">
              <form method="POST" action="/edita/player/{{$player->id}}">
                @csrf
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="nome">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder='EX: Roberto da silva' value="{{ old('nome', $player->nome) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $player->email) }}" disabled required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder='EX: 38 9 99273554' maxlength="18" value="{{ old('telefone', $player->telefone) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder='EX: 123.654.876-56' maxlength="18" value="{{ old('cpf', $player->cpf) }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="telefone2">Contato de Emergência</label>
                        <input type="text" class="form-control" id="telefone2" name="telefone2" placeholder='EX: 38 9 99273554' maxlength="18" value="{{ old('telefone2', $player->telefone2) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="data">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data" name="data" value="{{ old('data', $player->data) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="data">Arma Própria</label>
                        <select id="arma" name="arma" class="form-control" required>
                          <option value="1">Sim</option>
                          <option value="0">Não</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="sangue">Sanguíneo </label>
                        <select id="sangue" name="sangue" class="form-control" value="{{ old('sangue', $player->sangue) }}" required>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB">AB-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="end">Endereço</label>
                        <input type="text" class="form-control" id="end" name="end" placeholder='EX: Rua Cruzeiro' value="{{ old('endereco', $player->endereco) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="num">Número</label>
                        <input type="text" class="form-control" id="num" name="num" placeholder='EX: 75' maxlength="8" value="{{ old('numero', $player->numero) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="med">Faz Uso de Algum Medicamento ? Se Sim Qual ?</label>
                        <input type="text" class="form-control" id="med" name="med" placeholder='exemplo: Ritalina' value="{{ old('remedio', $player->remedio) }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="EX: Centro" value="{{ old('bairro', $player->bairro) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="EX: 39402-000" maxlength="11" value="{{ old('cep', $player->cep) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="alergia">Tem Alguma Alergia ? Se Sim Qual ?</label>
                        <input type="text" class="form-control" id="alergia" name="alergia" placeholder="EX: Sim, Alergia a Abelha" value="{{ old('alergia', $player->alergia) }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="EX: Montes Claros" maxlength="25" value="{{ old('cidade', $player->cidade) }}" required>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="patente">Graduação</label>
                        <select id="graduacao" name="patente" class="form-control" value="{{ old('patente', $player->patente) }}" required>
                          @foreach ($patentes as $patente)
                          <option value="{{$patente->id}}">{{$patente->nome}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- <div class="col-sm-3">
                      <div class="form-group">
                        <label for="Password">Senha</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="***********" value="{{$player->senha}}" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="Password2">Confirme a Senha</label>
                        <input type="password" class="form-control" id="Password2" name="Password2" placeholder="***********" required>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 d-flex justify-content-end align-content-end flex-column">
                    @hasPermission(1)
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    @endhasPermission
                  </div>
                </div>

              </form>
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

</html>