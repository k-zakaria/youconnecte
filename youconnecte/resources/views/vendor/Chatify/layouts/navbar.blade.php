<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Login</title>
    
</head>
<style>
    
    .navbar-brand {
        color: #339898;
        font-weight: bold;
    }

    .navbar-nav {
        margin-left: auto;
    }

    .card {
        margin-bottom: 20px;
        border: 1px solid #dddfe2;
        border-radius: 8px;
        background-color: #fff;
    }

    .card-header {
        background-color: #f0f2f5;
        border-bottom: none;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-weight: bold;
    }

    .card-text {
        margin-bottom: 15px;
    }

    .form-control {
        border-radius: 20px;
    }

    .btn-primary,
    .btn-danger,
    .btn-info {
        border-radius: 20px;
        margin-right: 10px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('post.index') }}" style="color: #141f38;"><span style="color: #023071;" class="nav-brand-two">You</span>Connecte</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if(Auth::check())
                    <li class="nav-item  ml-3">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle nav-link ml-5 navigation" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                                </svg>
                                {{ $messages->sum(function ($message) {
                                    return $message->likes->count();
                                }) 
                            }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-center  notify-drop" style="width: 40vh;" aria-labelledby="notificationsDropdown">
                                @foreach($messages as $message)
                                @php
                                $likedByUser = false;
                                foreach($message->likes as $like) {
                                if($like->user_id === auth()->user()->id) {
                                $likedByUser = true;
                                break;
                                }
                                }
                                @endphp

                                @if($likedByUser)
                                <div class="container">
                                    <div>{{ Auth::user()->name }} a aimé un message</div>
                                </div>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mr-4 ">
                        <a class="nav-link ml-5 navigation" href="chatify">Message</a>
                    </li>
                    <li class="nav-item ">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle nav-link ml-5 navigation " id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow dropdown__list" aria-labelledby="notificationsDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profil</a></li>
                                <li>
                                    <form action="/delete-account/{{ Auth::id() }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item">Delete my account</button>
                                    </form>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link ml-5 navigation" href="{{ route('user.register') }}">Register</a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link ml-5 navigation" href="{{ route('user.login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>