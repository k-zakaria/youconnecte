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
    color: #339898;
    font-weight: bold;
}

.navbar-nav {
    margin-left: auto;
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
            <a class="navbar-brand" href="{{ route('post.index') }}" style="color: #141f38;"><span style="color: #023071;" class="nav-brand-two">You</span>Connecte</a> 
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link navigation" href="">Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link ml-5 navigation" href="">Message</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link ml-5 navigation" href="">Log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container-fluid">
       <div class="row">
            <!-- Sidebar -->
           {{--  <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Profile</h5>
                        <img src="profile-picture.jpg" alt="Profile Picture" class="profile-picture mb-3">
                        <p class="card-text">Your Name</p>
                        <p class="card-text">Your Job Title</p>
                        <a href="#" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Connections</h5>
                        <p class="card-text">You have X connections</p>
                        <a href="#" class="btn btn-outline-primary">View Connections</a>
                    </div>
                </div>
                <!-- Add more sidebar sections as needed -->
            </div> --}}
            <!-- Main content -->
            <div class="col-md-6">
                <!-- Create Post -->
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" placeholder="What's on your mind?"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="media" class="form-control-file">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>
                <!-- News Feed -->
                @foreach ($messages as $message)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">News Feed</h5>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $message->user->name }}</h6>
                                    <p class="card-text">{{ $message->content }}</p>

                                    {{ Auth::id() }}
                                    <div class="message">
                                        <p>{{ $message->content }}</p>
                                        @if($message->media)
                                            <img src="{{ asset('storage/' . $message->media) }}" alt="Message Media">
                                        @endif
                                    </div>                             
                            </div>
                            <!-- Add more posts as needed -->
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                          <div>
                              <form action="" method="post">
                                  @csrf
                                  <input type="hidden" name="post_id" value="{{ $message->id }}">
                                  <button type="submit" name="submit" class="btn btn-primary">Like</button>
                              </form>
                          </div>
                          <div>
                              <form action="#" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-dark">Supprimer</button>
                              </form>
                              <a href="#" class="btn btn-dark ms-2">Edit</a>
                          </div>
                      </div>
                      

                    </div>
                @endforeach
            </div>
            <!-- Right sidebar -->
            <div class="col-md-3">
                <!-- Right sidebar content goes here -->
            </div>
        </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
