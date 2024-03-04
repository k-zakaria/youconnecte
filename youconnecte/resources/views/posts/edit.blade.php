@extends('vendor.chatify.layouts.navbar')
@section('content')
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

@endsection