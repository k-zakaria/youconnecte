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

<body>
    <div class=" modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src="https://a.storyblok.com/f/191576/1200x800/faa88c639f/round_profil_picture_before_.webp" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left ">
                    <div class=" text-start">
                    <h3 class="text-white font-weight-normal text-start mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2 mr-4" style="-webkit-text-stroke: 2px #ffffff;">{{ $user->name }}</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">Web Designer, Web Developer, Front End Developer, Apps Designer, Apps Developer</div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7 text-start ml-3">
                            <div class="row mb-3 ">
                                <div class="col-sm-6 py-2 ">
                                    <h6>Full Name: <span class="text-white">{{ $user->name }}</span></h6>
                                </div>
                                <div class="col-sm-6 py-2 ">
                                    <h6>Email: <span class="text-white">{{ $user->email }}</span></h6>
                                </div>
                                <div class="col-sm-6 py-2">
                                    <h6>Birthday: <span class="text-white">1 April 1990</span></h6>
                                </div>
                                <div class="col-sm-6 py-2">
                                    <h6>Phone: <span class="text-white">+012 345 6789</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>