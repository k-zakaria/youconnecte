<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'actualités</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    .btn-primary, .btn-danger, .btn-info {
        border-radius: 20px;
        margin-right: 10px;
    }
</style>
<body>
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
                                    <form action="" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="post_id" value="">
                                        <button type="submit" class="btn btn-sm btn-primary">Like</button>
                                    </form>
                                    <form action="" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="post_id" value="">
                                        <button type="submit" class="btn btn-sm btn-danger">Dislike</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>