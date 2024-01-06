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
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                {{-- @include('/alert') --}}
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="text-center text-danger"><b>Add New Form</b> <a href="{{url('table')}}" class="btn btn-danger float-end">View Table</a></h3>
				    @if(session('status'))
                        <h5 class="alert alert-success">{{session('status')}}</h5>
                    @endif
                    <div class="form-group">
                        <form action="{{url('/add_data')}}" method="post" enctype="multipart/form-data">
                             @csrf
        				    <input type="text" name="name" class="form-control m-2" placeholder="Enter Name">
        				    <input type="text" name="address" class="form-control m-2" placeholder="Enter Address">
        				    <input type="email" name="email" class="form-control m-2" placeholder="Enter Email">
                            <Textarea name="description" cols="20" rows="4" class="form-control m-2" placeholder="Message..."></Textarea>
        				    <input type="password" name="password" class="form-control m-2" placeholder="Enter Password">
                            <label class="m-2">Images</label>
                            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="image[]" multiple>
                            <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    @if(Session::has('success'))
        toastr.options = {
            "closeButton":true,
            "progressBar":true
        }
        toastr.success("{{ session('success') }}",'success!',{timeOut:2000})
    @endif
</script>