<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.1/fonts/remixicon.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset("img/favicon.png")}}" type="image/x-icon">
    <title>{{__('title_prefix')}} {{__($pageName.'_title_suffix')}}</title>
    @vite("resources/css/app.css")
    <style>
        nav img {
            max-height: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar p-0 shadow navbar-expand-lg navbar-light">
        <div class="container-fluid nav-container">
            <a class="navbar-brand" href="{{ "/".app()->getLocale() }}">
                <img class="img-fluid d-block" src="{{asset('img/logo.jpg')}}" alt="UHasselt Logo">
            </a>
          <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (auth()->check())
                <a class="nav-item nav-account-container" href="/{{app()->getLocale()}}/account">
                  <li class="avatar">
                    <img class="" src="{{ $student->pluck("avatar_url")[0]}}" alt="Avatar Image">
                 </li>
                 <li>
                  
                    <p class="nav-link" href="#">{{$student->pluck('name')[0]}} {{$student->pluck('lastname')[0]}}</p>
                  
                 </li>
                 </a>
                 @endif

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                    </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <div class="d-flex" id="language_switcher">
              @php
                    $url = url()->current();
                    $urlComponents = parse_url($url);
                    $pathSegments = explode('/', trim($urlComponents['path'], '/'));
                    array_shift($pathSegments);
                    $result = '/' . implode('/', $pathSegments);
              @endphp
              <a class="btn border-0 text-uppercase" href="/{{__('lang_to_switch')}}{{$result}}" >{{__('lang_to_switch')}}</a>
            </div>
            @if (auth()->check())
              <x-logout-form />
            @endif
          </div>
        </div>
      </nav>

  
    <main>
        {{$slot}}
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
