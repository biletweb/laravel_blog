<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Блог</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">--}}
    {{--bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{--endbootstrap--}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('main.index') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="Edica"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('main.category', $category->id) }}">{{ $category->title }}</a>
                            @endforeach
                            <a class="dropdown-item" href="{{ route('main.index') }}">Все</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#!">Контакты</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">О нас</a></li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Авторизоваться</a></li>
                    @endguest
                    @auth()
                        <li class="nav-item"><a class="nav-link" href="{{ route('personal.main.index') }}">Профиль</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
@yield('content')
<section class="edica-footer-banner-section">
    <div class="container">
        <div class="footer-banner" data-aos="fade-up">
            <p class="banner-text">Добавьте сюда вспомогательный текст, чтобы объяснить более тонкие детали вашего <br> продукта или услуги</p>
        </div>
    </div>
</section>
<footer class="edica-footer" data-aos="fade-up">
    <div class="container">
        <div class="footer-bottom-content">
            <nav class="nav footer-bottom-nav">
                <a href="#!">О нас</a>
                <a href="#!">Контакты</a>
            </nav>
            <p class="mb-0">Developed by <a href="#!" rel="noopener noreferrer" class="text-reset">biletweb</a> 2023</p>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>--}}
<script src="{{ asset('assets/js/main.js') }}"></script>
{{--bootstrap--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
{{--endbootstrap--}}
{{--<script>--}}
{{--    AOS.init({--}}
{{--        duration: 1000--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
