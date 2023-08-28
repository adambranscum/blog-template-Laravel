<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.typekit.net/hsm4vcl.css">
	<link href="{{ asset('css/hover.css') }}" rel="stylesheet">
	<script src="https://kit.fontawesome.com/55172d6e85.js" crossorigin="anonymous"></script>
	<title>Blog Template</title>
	</head>

<body class="d-flex flex-column min-vh-100">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Centered nav only <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown08">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

        <div class="bg-light p-4 mt-4 text-cream text-center fw-bolder container shadow">
            <h1 id="hero1" class="text-center fw-bolder text-cream display-3">Blog Template</h1>
            <p class="text-center text-cream mt-3 f-nav"></p>
        </div>

        <div class="container mt-4">
        <div class="row">
        <div class="col-12 col-md-8">
        @foreach($posts as $post)
        <div class="card mb-3 col-12 shadow">
        <div class="row g-0 d-flex">
        <div class="col-12 col-md-6">
        <a href="{{route('blog.post', ['post' => $post])}}"><img src= "../storage/headers/{{$post->post_header}}"  class="img-fluid rounded-start h-100" alt="..."></a>
        </div>
        <div class="col-md-6 col-12">
        <div class="col-12 card-body">
        <a class="text-decoration-none" href="{{route('blog.post', ['post' => $post])}}"><h5 class="card-title fw-bolder text-cream">{{$post->post_title}}</h5></a>
        <p class="card-text mb-5 text-cream">{{$post->post_excert}}</p>
        </div>
        </div>
        <div class="card-footer">
        <div class="card-text mt-auto"><small class="text-muted">{{$post->created_at}} <span class="float-end">{{$post->post_author}}</span></Small></div>
        </div>

        </div>
        </div>
        @endforeach
         </div>

    <div class="col-md-4 col-12">
      <div class="bg-light shadow p-2 border">
        <h5 class="text-cream fw-bolder">Recent Posts</h5>
        <ul>
        @foreach($recentPosts as $rc)
        <li class="text-cream"><a href="{{route('blog.post', ['post' => $post])}}" class="text-decoration-none text-cream">{{$rc->post_title}}</a></li>
        @endforeach

    </ul>
</div>
    <div class="bg-light shadow p-2 border mt-4 mb-5">
        <h5 class="text-cream fw-bolder">Fun Pics!</h5>
        @foreach($adv as $add)
        <a href="{{$add->url}}" alt="{{$add-> alt}}" class="text-decoration-none text-dark mb-3"><img class="img-fluid shadow mb-3" src="../storage/carousel/{{$add-> file}}"></a></li>
        @endforeach


    <ul class="mt-3">

    </ul>
    </div>
    </div>
    </div>
    </div>

    <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
    <p class="text-center text-muted">© 2021 Company, Inc</p>
  </footer>
    </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
