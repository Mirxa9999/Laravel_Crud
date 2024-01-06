
{{-- @dd($customer) --}}
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel CRUD With Multiple Image Upload</title>

      <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <h3 class="text-center text-danger"><b>Laravel CRUD With Multiple Image Upload</b> </h3>
            <a href="{{url('/')}}" class="btn btn-outline-success">Add New Data</a>

            <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $data)
                 <tr>
                       <th scope="row">{{$data->id}}</th>
                       <td>{{$data->name}}</td>
                       <td>{{$data->address}}</td>
                       <td>{{$data->email}}</td>
                       <td>{{$data->description}}</td>
                       @php
                           $images= explode(',',$data->image);
                       @endphp
                       @foreach ($images as $image)
                       <td><img src="/laravel_image/{{$image}}" class="img-responsive" style="max-height:60px; max-width:50px"srcset=""></td>
                       @endforeach
                       <td><a href="{{ '/view/edit' }}/{{ $data->id }}" class="btn btn-outline-primary">Update</a></td>
                       <td><a href="{{ url('deletetable',$data->id) }}" class="btn btn-outline-danger">Delete</a></td>
                   </tr>
                   @endforeach
                </tbody>
              </table>
        </div>
    </body>
</html>

<script>
    // ============== Delete Toastr ==================
  @if(Session::has('danger'))
      toastr.options = {
          "closeButton":true,
          "progressBar":true
      }
      toastr.error("{{ session('danger') }}",'error!',{timeOut:2000});
  @endif

    // ============== Update toastr =============
  @if(Session::has('success'))
      toastr.options = {
          "closeButton":true,
          "progressBar":true
      }
      toastr.success("{{ session('success') }}",'success!',{timeOut:2000});
  @endif
</script>
