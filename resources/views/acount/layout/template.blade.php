<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/css/style_custom.css') }}">
    <script type="text/javascript" src="{{ url('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script type="text/javascript" src="{{ url('public/assets/js/jMask/dist/jquery.mask.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/assets/js/mask.js') }}"></script>
    <title>{{ $title }}</title>
</head>
<body>
<header class="dashHeader">
    <div class="container">
        <div class="row py-3">
            <div class="col-6">
                <h4 class="text-uppercase text-white">{{ env('APP_NAME') }}</h4>
            </div>
            <div class="col-6">
                <nav class="nav justify-content-end">
                    <a href="{{ route('sys.logout') }}" class="btn btn-sm" style="background-color: mediumseagreen; color: #f1f1f1;"><i class="fas fa-sign-out-alt"></i> sair</a>

                </nav>
            </div>

        </div>

    </div>

</header>
<div class="headerMenu" style="background-color: #eeeeee">
    <div class="container">
        <div class="row py-4">
            <div class="col-12">
                <nav class="nav">
                    <a href="{{ route('acount.home') }}" class="nav-link bg-light text-primary">Dashboard</a>
                    <a href="{{ route('contact.view') }}" class="nav-link bg-light text-primary">Contatos</a>
                    <a href="{{ route('groups.index') }}" class="nav-link bg-light text-primary">Grupos</a>
                    <a href="{{ route('events.index') }}" class="nav-link bg-light text-primary">Eventos</a>

                </nav>
            </div>

        </div>

    </div>
</div>

@yield('main')

</body>
</html>
