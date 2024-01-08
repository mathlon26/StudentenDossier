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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
                <img class="img-fluid d-block" src="{{asset('img/logo_students.png')}}" alt="UHasselt Logo">
            </a>
          <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (auth()->check())
                <li id="nav-account-container">
                  <a class="nav-item nav-account-container" href="/{{app()->getLocale()}}/account">
                    <div class="avatar">
                      <img class="" src="{{ asset($student->pluck("avatar_url")[0])}}" alt="Avatar Image">
                   </div>
                   <div class="ps-2">
                    
                      <p class="nav-link fs-4 text-nowrap " href="#">{{$student->pluck('name')[0]}} {{$student->pluck('lastname')[0]}}</p>
                    
                   </div>
                  </a>
                </li>
                
                 @endif
                 <li class="nav-item page-subtitle-item" id="page-subtitle-item">
                  <p class="page-subtitle fs-4 fw-bold text-nowrap">{{__($pageName.'_title_suffix')}}</p>
                </li>
                <li class="nav-separator" id="nav-separator"></li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/{{app()->getLocale()}}">{{__('dossier_nav_start')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-nowrap" href="/{{app()->getLocale()}}">{{__('dossier_nav_planning')}}</a>
                </li>
                
                <x-nav-dropdown />
              </li>
              <li class="nav-item ">
                <a href="/{{app()->getLocale()}}" class="nav-link">{{__('dossier_nav_courses')}}</a>
              </li>
              @if (auth()->check())
              <x-nav-notifications />
              @endif
            </ul>
            <div class="d-flex nav-item" id="language_switcher">
              @php
                    $url = url()->current();
                    $urlComponents = parse_url($url);
                    $pathSegments = explode('/', trim($urlComponents['path'], '/'));
                    array_shift($pathSegments);
                    $result = '/' . implode('/', $pathSegments);
              @endphp
              <a class="btn mx-4 border-0 text-uppercase" href="/{{__('lang_to_switch')}}{{$result}}" >{{__('lang_to_switch')}}</a>
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