<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="Adam Branscum" content="" />
        <title>Blog Template</title>
        <!-- Favicon-->
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
    <body class="d-flex flex-column min-vh-100">
      

        <div class="container mt-4">
            <form method="POST" action="{{route('admin.update', ['post' => $post])}}" class="p-4 bg-light shadow mb-5" enctype="multipart/form-data">
                @csrf 
                @method('put')

        <h1 class="fw-bolder p-4 text-center text-dark">Update Post</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    
    
            @endif
        </div>
        <div>
            @if(session()->has('success'))
                <div>
                   <p class="text-success text-center"> {{session('success')}} </p>
                </div>
            @endif
            <div>
                <p class="text-warning text-center">   {{session('error')}} </p>
            </div>
                <div class="row">
                <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                    <label for="Alt text" class="form-label text-dark">Alt Text:</label>
                              <input type="text" name="alt" value="{{$post->post_author}}" class="form-control" required>
                          </div>
                <div class="mb-3 col-12 col-sm-12 col-lg-6 body-font">
                    <label for="url" class="form-label text-dark">URL:</label>
                              <input type="text" name="url" class="form-control" value="{{$post->post_title}}" required>
                            </div>
                <button class="btn btn-outline-success mt-4 float-end shadow" type="submit" name="upload" value="Upload">Submit</button>
                        </div>
              </form>
            </div>  
    </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
