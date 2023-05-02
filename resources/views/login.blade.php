@extends('layouts.head')

<body class="hold-transition login-page" style="background-image: url('{{asset('img/background.webp')}}')">
  <div class="login-box">
  @include('layouts.loading')
    <!-- /.login-logo -->
    <div class="card card-outline">
      <div class="card-header text-center" style="background-color: #bbd4f9')">
        <a href="#" class="h1"><img src="{{asset('img/logo2.png')}}" alt="logo"></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Faça o Login Para Iniciar Sua Sessão</p>

        @if($errors->any())
        <div class="alert alert-danger" role="alert">
          {{ $errors->first() }}
        </div>
        @endif

        <form action="/login" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <p class="mb-0">
                <a href="/register" class="text-center">Registre-se</a>
              </p>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</body>

</html>
