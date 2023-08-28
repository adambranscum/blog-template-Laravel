<x-app-layout>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="Adam Branscum" content="" />
        <title>Blog Template</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.typekit.net/iyu0gvk.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>

    tinymce.init({

      selector: 'textarea#editor', // Replace this CSS selector to match the placeholder element for TinyMCE

      plugins: 'code table lists',

      promotion: false,

      toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'

    });

  </script>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


        <div class="bg-light p-2 shadow container mt-4 mb-5">

        <div class="p-4 mt-4 text-dark text-center fw-bolder display-3">Admin console</div>
            @if(session()->has('success'))
                <div>
                   <p class="text-success text-center"> {{session('success')}} </p>
                </div>
            @endif
            <div>
                <p class="text-warning text-center">   {{session('error')}} </p>
            </div>
        <div class="mt-4 mb-5 container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link fw-bolder text-decoration-none text-dark active" data-bs-toggle="tab" href="#home">Active Posts</a></li>
                <li class="nav-item"><a class="nav-link fw-bolder text-decoration-none text-dark" data-bs-toggle="tab" href="#menu1">Inactive  Posts</a></li>
                <li class="nav-item"><a class="nav-link fw-bolder text-decoration-none text-dark" data-bs-toggle="tab" href="#menu2">Upload Carousel</a></li>
                <li class="nav-item"><a class="nav-link fw-bolder text-decoration-none text-dark" data-bs-toggle="tab" href="#menu5">View Carousel</a></li>
                <li class="nav-item"><a class="nav-link fw-bolder text-decoration-none text-dark" data-bs-toggle="tab" href="#menu3">Create Post</a></li>
                <li class="nav-item"><a class="nav-link fw-bolder text-decoration-none text-dark" data-bs-toggle="tab" href="#menu4">Statistics</a></li>
              </ul>
                <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-12 col-md-12">
                        <div class="row text-center text-dark border fw-bolder">
                        <div class="col-5 border-end">Post Title</div>
                        <div class="col-2 border-end"> Author</div>
                        <div class="col-2 border-end"> Date </div>
                        <div class="col-1 border-end">View</div>
                        <div class="col-1 border-end"> Edit</div>
                        <div class="col-1"> Delete</div>
                    </div>
                        @foreach($posts as $post)
                        <div class="row text-center text-dark border d-flex">
                        <div class="col-5 border-end pt-2 pb-2 mt-auto mb-auto">{{$post->post_title}}</div>
                        <div class="col-2 border-end pt-2 pb-2 mt-auto mb-auto"> {{$post->post_author}}</div>
                        <div class="col-2 border-end pt-2 pb-2 mt-auto mb-auto"> {{$post->created_at}} </div>
                        <div class="col-1 border-end pt-2 pb-2 mt-auto mb-auto"><a class="text-decoration-none btn-warning btn mt-auto mb-auto shadow" href="{{route('blog.post', ['post' => $post])}}">View</a></div>
                        <div class="col-1 border-end pt-2 pb-2 mt-auto mb-auto"><a href="{{route('admin.edit', ['post' => $post])}}" class="btn btn-success">Edit</a></div>
                        <div class="col-1 border-end pt-2 pb-2 mt-auto mb-auto"><form class="mt-auto mb-auto" method="post"  action="{{route('post.delete', ['post' => $post])}}">
                            @csrf
                            @method('delete')
                            <input  class="btn btn-danger shadow text-decoration-none mt-auto mb-auto" type="submit" value="Delete" />
                        </form> </div>
                    </div>
                        @endforeach

            </div>
        </div>
    </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <div class="col-12 col-md-12">
                        <div class="row text-center text-dark border fw-bolder">
                        <div class="col-5 border-end">Post Title</div>
                        <div class="col-2 border-end"> Author</div>
                        <div class="col-2 border-end"> Date </div>
                        <div class="col-1 border-end">View</div>
                        <div class="col-1 border-end"> Edit</div>
                        <div class="col-1"> Delete</div>
                    </div>
                        @foreach($posts_inactive as $post_inactive)
                        <div class="row text-center text-dark border d-flex">
                        <div class="col-5 border-end pt-2 pb-2 mt-auto mb-auto">{{$post_inactive->post_title}}</div>
                        <div class="col-2 border-end pt-2 pb-2 mt-auto mb-auto"> {{$post_inactive->post_author}}</div>
                        <div class="col-2 border-end pt-2 pb-2 mt-auto mb-auto"> {{$post_inactive->created_at}} </div>
                        <div class="col-1 border-end pt-2 pb-2 mt-auto mb-auto"><a class="text-decoration-none btn-warning btn mt-auto mb-auto shadow" href="{{route('blog.post', ['post' => $post_inactive])}}">View</a></div>
                        <div class="col-1 border-end pt-2 pb-2 mt-auto mb-auto"> <a href="{{route('admin.edit', ['post' => $post_inactive])}}" class="btn btn-success">Edit</a></div>
                        <div class="col-1 border-end pt-2 pb-2 mt-auto mb-auto"><form class="mt-auto mb-auto" method="post"  action="{{route('post.delete', ['post' => $post_inactive])}}">
                            @csrf
                            @method('delete')
                            <input  class="btn btn-danger shadow text-decoration-none mt-auto mb-auto" type="submit" value="Delete" />
                        </form> </div>
                    </div>
                        @endforeach

            </div>
        </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                 <form method="POST" action="{{route('carousel.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

            <h1 class="fw-bolder p-4 text-center text-dark">Upload a New Carousel Image</h1>
                <div>
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                            <label for="url" class="form-label text-dark">URL:</label>
                                      <input type="text" name="url" class="form-control" required>
                                  </div>
                                  <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                                    <label for="alt-text" class="form-label text-dark">Alt Text:</label>
                                              <input type="text" name="alt" class="form-control" required>
                                          </div>
                                          <div class="mb-3 col-12 col-sm-12 col-md-6">
                                            <label for="file" class="form-label text-dark">Upload Image Here:</label>
                                            <input class="form-control upload-file text-dark" type="file" name="file" required>
                                                </div>
                                                <button class="btn btn-outline-success mt-4 float-end shadow" type="submit" name="upload" value="Upload">Submit</button>
                                            </div>
                                        </div>
                 </form>
                </div>
            <div id="menu5" class="tab-pane fade">
                <div class="row mt-3">
                    <div>
                        @if(session()->has('success'))
                            <div>
                               <p class="text-success text-center"> {{session('success')}} </p>
                            </div>
                        @endif
                        </div>
                @foreach($adv as $post)
                <div class="card me-2 shadow" style="width: 18rem;">
                    <img src="../storage/carousel/{{$post-> file}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$post-> url}}</h5>
                      <p class="card-text">{{$post-> alt}}</p>
                      <div class="row">
                      <div class="col-6">
                      <a href="{{route('carousel.edit', ['post' => $post])}}" class="btn btn-success">Edit</a>
                      </div>
                      <div class="col-6">
                      <form class="mt-auto mb-auto" method="post"  action="{{route('carousel.delete', ['post' => $post])}}">
                        @csrf
                        @method('delete')
                        <input  class="btn btn-danger shadow text-decoration-none mt-auto mb-auto" type="submit" value="Delete" />
                    </form>
                </div>
                </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
                <div id="menu3" class="tab-pane fade">
                    <form method="POST" action="{{route('blog.store')}}" class="p-4 mb-5 mt-3" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                <h1 class="fw-bolder p-4 text-center text-dark">Create a New Post</h1>

                        <div class="row">
                        <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                            <label for="post_author" class="form-label text-dark">Author:</label>
                                      <input type="text" name="post_author" class="form-control" required>
                                  </div>
                        <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                            <label for="post_author" class="form-label text-dark">Title:</label>
                                      <input type="text" name="post_title" class="form-control" required>
                                    </div>
                        <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                            <label for="post_author" class="form-label text-dark">Tags:</label>
                                      <input type="text" name="post_tags" class="form-control" required>
                                     </div>
                        <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                            <label for="post_author" class="form-label text-dark">Excert (for Summary):</label>
                                        <input type="text" name="post_excert" class="form-control" required>
                                      </div>

                        <div class="mb-3 col-12 col-sm-12 col-md-6">
                            <label for="post_author" class="form-label text-dark">Upload Header Here:</label>
                            <input class="form-control upload-file text-dark" type="file" name="file" required>
                                </div>

                        <div class="mb-3 col-12 col-sm-12 col-md-6">
                            <label for="location" class="form-label text-dark">Post Status:</label>
                            <select class="form-select" name="post_status" required>
                            <option selected></option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                            </select>
                                    </div>

                        <textarea id="editor" name="post" cols="30" rows="10"></textarea>
                        <button class="btn btn-outline-success mt-4 float-end shadow" type="submit" name="upload" value="Upload">Submit</button>
                                </div>
                      </form>
                  </div>
                  <div id="menu4" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div>
              </div>



            </div>
    </div>
    </div>
    </div>



            </div>
        </div>
    </div>
</x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
