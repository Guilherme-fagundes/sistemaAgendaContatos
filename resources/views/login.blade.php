<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/css/style_custom.css') }}">
    <script type="text/javascript" src="{{ url('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <title>{{ $title }}</title>

</head>
<body>

<section class="login">
    <div class="loginBox">
        <h3 class="text-center" style="font-weight: 300">Entrar no sistema</h3>
        <form method="post" action="{{ route('sys.loginPost') }}">
            @csrf
            @if($errors->all())
                @if($errors->all()[0] == 'error')
                    <div class="alert alert-warning" role="alert">
                        {{ $errors->all()[1] }}
                    </div>
                @else
                    <div class="alert alert-success" role="alert">
                        {{ $errors->all()[1] }}
                    </div>
                @endif
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control form-control-sm rounded-0" id="email">

            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Senha</label>
                <input type="password" name="pass" class="form-control form-control-sm rounded-0" id="pass">

            </div>
            <button type="submit" class="btn btn-primary btn-sm rounded-0">Entrar</button>
            <span style="float: right"><small class="text-dark">Ainda não tem conta? </small><a href="{{ route('sys.newAcount') }}" class="btn btn-link btn-sm">Crie uma agora</a></span>
        </form>
    </div>

</section>

</body>
</html>
