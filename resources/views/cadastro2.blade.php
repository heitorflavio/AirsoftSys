@extends('layouts.head')

<body class="hold-transition register-page" style="background-image: url('{{asset('img/background.webp')}}')">
    <div class="row">
        <div class="register-logo">
            <a href="/"><img src="{{asset('img/logo2.png')}}" alt="logo"></a>
        </div>

        <div class="card p-6">
            <form method="POST" action="/register">
                @csrf
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder='EX: Roberto da silva' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" maxlength="18" placeholder='EX: 38 9 99273554' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" placeholder='EX: 123.654.876-56' required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="telefone2">Contato de Emergência</label>
                                <input type="text" class="form-control" id="telefone2" name="telefone2" maxlength="18" placeholder='EX: 38 9 99273554' required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="data">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data" name="data" required>
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
                                <select id="sangue" name="sangue" class="form-control" required>
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
                                <input type="text" class="form-control" id="end" name="end" placeholder='EX: Rua Cruzeiro' required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="num">Número</label>
                                <input type="text" class="form-control" id="num" name="num" maxlength="8" placeholder='EX: 75' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="med">Faz Uso de Algum Medicamento ? Se Sim Qual ?</label>
                                <input type="text" class="form-control" id="med" name="med" placeholder='exemplo: Ritalina' required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="EX: Centro" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="cep">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" maxlength="11" placeholder="EX: 39402-000" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alergia">Tem Alguma Alergia ? Se Sim Qual ?</label>
                                <input type="text" class="form-control" id="alergia" name="alergia" placeholder="EX: Sim, Alergia a Abelha" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" maxlength="25" placeholder="EX: Montes Claros" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Password">Senha</label>
                                <input type="password" class="form-control" id="Password" name="Password" placeholder="***********" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Password2">Confirme a Senha</label>
                                <input type="password" class="form-control" id="Password2" name="Password2" placeholder="***********" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end align-content-end flex-column">
                        <button type="submit" class="btn btn-primary" id="submit">Cadastrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</body>
<script src="{{asset('js/validar-senhas.js')}}"></script>

</html>