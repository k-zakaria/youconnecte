<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'actualités</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/like.js') }}" defer></script>
</head>
<style>
    .navbar-brand {
        color: #1877f2;
        font-weight: bold;
        font-size: 24px;
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
<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('post.index') }}">YouConnect</a> 
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link navigation" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ml-5 navigation" href="#">Message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ml-5 navigation" href="#">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publier un post</div>

                <div class="card-body">
                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="content" placeholder="Exprimez-vous..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="media" class="form-control-file">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Publier</button>
                    </form>
                </div>
=======
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('post.index') }}">YouConnect</a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link navigation" href="#">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navigation" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5 navigation" href="chatify">Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-5 navigation" href="#">Log Out</a>
                    </li>
                </ul>
>>>>>>> 55f07ad2a27d642de452f2f53242a878a75a0bb3
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Publier un message</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" placeholder="Exprimez-vous..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="media" class="form-control-file">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Publier</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Fil d'actualité</div>

                    <div class="card-body">
                        @foreach ($messages as $message)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="dropdown dropleft">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <!-- Trois points -->
                                        ...
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <!-- Options -->
                                        <a href="{{ route('edit.post', ['id' => $message->id]) }}" class="dropdown-item" href="#">Modifier  post</a>
                                        <form action="{{ route('delete.post', ['id' => $message->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Supprimer post</button>
                                        </form>                                        
                                        </div>
                                </div>
                                <h5 class="card-title">{{ $message->user->name }}</h5>
                                <p class="card-text">{{ $message->content }}</p>
                                @if($message->media)
                                <img src="{{ asset('storage/' . $message->media) }}" alt="Media" class="img-fluid">
                                @endif
                                <div class="mt-3">
                                    <form action="{{ route('posts.like') }}" method="post" id="form-js" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" id="message-id-js" value="{{$message->id}}">
                                        <button id="count-js" type="submit" class="btn btn-sm btn-primary">{{$message->likes->count()}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                            </svg></button>

                                    </form>
                                </div>
                              
                                <div class="mt-3">
                                <form id="comment-form">
                                    <textarea class="form-control" id="cmnt" name="commentaire" placeholder="Ajouter un commentaire..."></textarea>
                                    <button type="button" class="btn btn-primary mt-2">commenter</button>
                                </form>
                            </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

=======
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
>>>>>>> 55f07ad2a27d642de452f2f53242a878a75a0bb3
</body>

</html>