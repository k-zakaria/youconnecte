<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'actualités</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="card-header">Editer le post</div>

<div class="card-body">
    <form method="post" action="{{ route('update.post', ['id' => $message->id]) }}" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="Exprimez-vous...">{{ $message->content }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="media" value="{{ $message->media }}" class="form-control-file">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Publier</button>
    </form>
</div>
</div>