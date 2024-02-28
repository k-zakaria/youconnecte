@extends('vendor.chatify.layouts.navbar')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 mt-5">
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
                <div class="row">
                    @foreach($users as $user)
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">With supporting text .</p>
                                @if(auth()->user()->isSubscribedTo($user->id))
                                <form action="{{ route('user.unsubscribe', Auth::user()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" id="message-id-js" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-primary">Se désabonner</button>
                                    <a href="#" class="btn btn-secondary">Message</a>
                                </form>
                                @else
                                <form action="{{ route('user.subscribe', Auth::user()) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="message-id-js" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-danger">S'abonner</button>
                                    <a href="#" class="btn btn-secondary">Message</a>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



        <div class="col-md-8  ">
            <div class="card-header">Fil d'actualité</div>
            <div class="card-body ">
                @foreach ($messages as $message)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="dropdown dropleft">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Trois points -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                    <path d="M9 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-2-6a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm0 7a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- Options -->
                                <a href="{{ route('edit.post', ['id' => $message->id]) }}" class="dropdown-item">Modifier post</a>
                                <form action="{{ route('delete.post', ['id' => $message->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Supprimer post</button>
                                </form>
                            </div>
                        </div>
                        @if ($message && $message->user)
                        <h5 class="card-title">{{ $message->user->name }}</h5>
                        @endif
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
                        <!-- Commentaires -->
                        <div class="mt-3">
                            @foreach($message->comments as $comment)
                            <div class="flex bg-slate-50 p-6 rounded-lg">
                                <div class="ml-4 flex flex-col">
                                    <div class="flex flex-col sm:flex-row sm:items-center">
                                        <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400 ">{{$comment->created_at->diffForHumans()}}</time>
                                    </div>
                                    <p id="namecmnt">{{ $comment->user->name }}</p>
                                    <p class="mt-4 text-slate-800 sm:leading-loose">{{ $comment->content }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Formulaire pour ajouter un commentaire -->
                        <div class="mt-3">
                            <form action="{{ route('comments.store', ['message' => $message->id]) }}" method="post">
                                @csrf
                                <textarea class="form-control" name="commentaire" placeholder="Ajouter un commentaire..."></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Commenter</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection
